<?php namespace backend\tests;

use backend\models\SignupForm;
use common\models\User;


class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    //INICIALIZAÇÃO  E VALIDAÇÃO
    public function testVerificarUserExiste()
    {
        $this->tester->SeeRecord(User::class, ['username' => 'colab']);
    }

    //CAMPOS ÚNICOS
    //VERIFICA SE O CAMPO DO USERNAME PODE SER REPETIDO
    public function testUsernameRepetido() // Verifica se o campo Username pode ser repetido
    {
        $signup = new SignupForm();
        $signup->username = 'colab';
        $signup->email = 'test@sportgym.pt';
        $signup->password = 'user';

        $this->assertFalse($signup->validate());
    }

    //VERIFICA SE O CAMPO DO EMAIL PODE SER REPETIDO
    public function testEmailRepetido() 
    {
        $signup = new SignupForm();
        $signup->username = 'test';
        $signup->email = 'colab@colab.com';
        $signup->password = 'test';

        $this->assertFalse($signup->validate());
    }

    //CAMPOS OBRIGATÓRIOS
    //TESTA SE O CAMPO DO USERNAME PODE SER VAZIO
    public function testUsernameVazio() 
    {
        $signup = new SignupForm();
        $signup->username = null;
        $signup->email = 'test@sportgym.pt';
        $signup->password = 'test';

        $this->assertFalse($signup->validate());
    }

    //TESTA SE O CAMPO DO EMAIL PODE SER VAZIO
    public function testEmailVazio() 
    {
        $signup = new SignupForm();
        $signup->username = 'test';
        $signup->email = null;
        $signup->password = 'test';

        $this->assertFalse($signup->validate());
    }

    //TESTA SE O CAMPO DA PASSWORD PODE SER VAZIO
    public function testPasswordVazio() 
    {
        $signup = new SignupForm();
        $signup->username = 'test';
        $signup->email = 'test@sportgym.pt';
        $signup->password = null;

        $this->assertFalse($signup->validate());
    }

    //CAMPOS COM MÁXIMO DE CHARS
    //VERIFICA A INSERÇÃO DE UM USERNAME DEMASIADO LONGO
    public function testUsernameDemasiadoLongo() // Verifica se o campo Username pode conter a quantida de chars inseridos
    {
        $signup = new SignupForm();
        $signup->username = 'ttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeessssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssttttttttttttttttttttttttttttttttttttttttttttttttttttttttt';
        $signup->email = 'test@sportgym.pt';
        $signup->password = 'test';

        $this->assertFalse($signup->validate());
    }

    //VERIFICA A INSERÇÃO DE UM EMAIL DEMASIADO LONGO
    public function testEmailDemasiadoLongo() 
    {
        $signup = new SignupForm();
        $signup->username = 'test';
        $signup->email = 'tttttttttttttttttttttttttttttttttttttttttteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeesssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssstttttttttttttttttttttttttttttttttttt@sportgym.pt';
        $signup->password = 'test';

        $this->assertFalse($signup->validate());
    }

    //VERIFICAÇÃO DE EMAIL VÁLIDO
    public function testEmailValidacao() // Verifica se o campo email é do tipo email
    {
        $signup = new SignupForm();
        $signup->username = 'test';
        $signup->email = 'testsportgymcom';
        $signup->password = 'test';

        $this->assertFalse($signup->validate());
    }

    //Cria e Atualiza o campo USERNAME do USER criado
    public function testAtualizarUsername() // Verifica se o campo email é do tipo email
    {
        $user = new User();
        $user->username = 'user';
        $user->email = 'user@sportgym.com';
        $user->setPassword('user');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();

        $username_antigo = 'user';
        $username_novo = 'alterado';

        $this->tester->seeRecord(User::class, ['username' => $username_antigo]);
        $this->tester->dontSeeRecord(User::class, ['username' => $username_novo]);

        $user = User::find()->where(['username' => $username_antigo])->one();
        $user->username = $username_novo;
        $user->save();

        $this->tester->seeRecord(User::class, ['username' => $username_novo]);
        $user->username = $username_antigo;
        $user->save();
    }

    //Cria e Atualiza o campo Email do USER criado
    public function testAtualizarEmail() // Verifica se o campo email é do tipo email
    {
        $user = new User();
        $user->username = 'user';
        $user->email = 'user@sportgym.com';
        $user->setPassword('user');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();

        $email_antigo = 'user@sportgym.com';
        $email_novo = 'alterado@sportgym.com';

        $this->tester->seeRecord(User::class, ['email' => $email_antigo]);
        $this->tester->dontSeeRecord(User::class, ['email' => $email_novo]);

        $user = User::find()->where(['email' => $email_antigo])->one();
        $user->email = $email_novo;
        $user->save();

        $this->tester->seeRecord(User::class, ['email' => $email_novo]);
        $user->email = $email_antigo;
        $user->save();
    }

    //Cria e apaga um USER
    public function testApagarUser()
    {
        $user = new User();
        $user->username = 'user';
        $user->email = 'user@sportgym.com';
        $user->setPassword('user');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        $user->save();

        $this->tester->seeRecord(User::class, ['username' => 'user']);
        $user = User::find()->where(['username' => 'user'])->one();
        $user->delete();
        $this->tester->dontSeeRecord(User::class, ['username' => 'user']);
    }
}