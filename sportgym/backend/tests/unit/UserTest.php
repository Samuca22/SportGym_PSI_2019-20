<?php namespace backend\tests;

use backend\models\SignupForm;
use common\models\LoginForm;
use common\models\Perfil;
use common\models\User;
use common\models\Venda;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $user = new User();
        $user->username = 'colaborador';
        $user->email = 'colaborador@sportgym.com';
        $user->setPassword('admin');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();
    }

    protected function _after()
    {
    }


    //INICIALIZAÇÃO  E VALIDAÇÃO
    public function testVerificarGinasioExiste() // Test para verificar se o Ginasio extiste
    {
        $this->tester->SeeRecord(User::class, ['username' => 'colaborador']);
    }


    //CAMPOS ÚNICOS
    public function testUsernameRepetido() // Verifica se o campo Username pode ser repetido
    {
        $signup = new SignupForm();
        $signup->username = 'colaborador';
        $signup->email = 'ceo@sportygym.com';
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }

    public function testEmailRepetido() // Verifica se o campo Email pode ser repetido
    {
        $signup = new SignupForm();
        $signup->username = 'ceo';
        $signup->email = 'colaborador@sportgym.com';
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }


    //CAMPOS OBRIGATÓRIOS
    public function testUsernameVazio() // verifica se o campo username pode ser igual a Vazio
    {
        $signup = new SignupForm();
        $signup->username = null;
        $signup->email = 'ceo@sportgym.com';
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }

    public function testEmailVazio() // verifica se o campo email pode ser igual a Vazio
    {
        $signup = new SignupForm();
        $signup->username = 'ceo';
        $signup->email = null;
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }

    public function testPasswordVazio() // verifica se o campo Passowrd pode ser igual a Vazio
    {
        $signup = new SignupForm();
        $signup->username = 'ceo';
        $signup->email = 'ceo@sportgym.com';
        $signup->password = null;

        $this->assertFalse($signup->validate());
    }


    //CAMPOS COM MÁXIMO DE CHARS
    public function testUsernameDemasiadoLongo() // Verifica se o campo Username pode conter a quantida de chars inseridos
    {
        $signup = new SignupForm();
        $signup->username = 'ssssssssssssssssssssssssssssslllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss';
        $signup->email = 'ceo@sportgym.com';
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }

    public function testEmailDemasiadoLongo() // Verifica se o campo Email pode conter a quantida de chars inseridos
    {
        $signup = new SignupForm();
        $signup->username = 'ceo';
        $signup->email = 'ssssssssssssssssssssssssssssslllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss@sapo.pt';
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }


    //VERIFICAÇÃO DO TIPO EMAIL
    public function testEmailValidacao() // Verifica se o campo email é do tipo email
    {
        $signup = new SignupForm();
        $signup->username = 'ceo';
        $signup->email = 'ceosportgymcom';
        $signup->password = 'admin';

        $this->assertFalse($signup->validate());
    }


}