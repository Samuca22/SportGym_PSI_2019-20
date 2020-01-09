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


    }

    protected function _after()
    {
    }

    // tests
    public function getUserValido()
    {

        $user = new User();
        $user->username = 'admin';
        $user->password = 'pwadmin';
        $user->email = 'admin@sportgym.pt';


        return $user;

    }


    public function testUserValido() //Verifica se o Venda é valida
    {
        $user = $this->getUserValido();
        $this->assertTrue($user->validate());
    }


/*
    public function testUsernameVazio() // verifica se o campo User pode ser igual a Vazio
    {
        $user = $this->getUserValido();
        $user->username = null;
        $this->assertFalse($user->validate(['username']));
    }

*/



    public function testVerificarUserUsername() // verifica se o user se encontra na base dados
    {
        $user = new LoginForm([

            'username' => 'admin',
        ]);

        $user->login();
        $this->tester->seeRecord('common\models\User', [
            'username' => 'admin',
            'status' => \common\models\User::STATUS_ACTIVE
        ]);
    }







}