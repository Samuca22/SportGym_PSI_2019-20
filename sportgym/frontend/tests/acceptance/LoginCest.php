<?php

namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;

class HomeCest
{
    /*  Credenciais do utilizador (Administrador):
    /
    /   Username:   admin    
    /   Password:   admin
    /
    */

    //Testa se um utilizador "Guest" consegue aceder às vistas do website
    public function testGuestViews(AcceptanceTester $I)
    {
        $I->amOnPage('/site/index');

        $I->wait(3);
        $I->click(['link' => 'Clubes']);
        $I->amOnPage('/ginasio/index');
        $I->see('Clubes', 'h3');

        $I->wait(3);
        $I->click(['link' => 'Sobre Nós']);
        $I->amOnPage('/site/about');
        $I->see('Sobre Nós', 'h3');

        $I->wait(3);
        $I->click(['link' => 'Login']);
    }

    //Testa a tentativa de Login sem preencher os campos
    public function testLoginEmptyFields(AcceptanceTester $I)
    {
        $I->wait(3);
        $I->amOnPage('/site/login');

        $I->fillField(['name' => 'LoginForm[username]'], '');
        $I->wait(1);
        $I->fillField(['name' => 'LoginForm[password]'], '');
        $I->wait(1);
        $I->click('#button-login');

        $I->wait(2);
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    //Testa a tentativa de Login sem preencher o campo do 'Username'
    public function testLoginEmptyUsername(AcceptanceTester $I)
    {
        $I->wait(3);
        $I->amOnPage('/site/login');

        $I->fillField(['name' => 'LoginForm[username]'], '');
        $I->wait(1);
        $I->fillField(['name' => 'LoginForm[password]'], 'admin');
        $I->wait(1);
        $I->click('#button-login');

        $I->wait(1);
        $I->see('Username cannot be blank.');
    }

    //Testa a tentativa de Login ao inserir um 'Username' incorreto
    public function testLoginWrongUsername(AcceptanceTester $I)
    {
        $I->wait(3);
        $I->amOnPage('/site/login');

        $I->fillField(['name' => 'LoginForm[username]'], 'wrong');
        $I->wait(1);
        $I->fillField(['name' => 'LoginForm[password]'], 'admin');
        $I->wait(1);
        $I->click('#button-login');


        $I->wait(3);
        $I->see('Incorrect username or password.');
    }

    //Testa a tentativa de Login com uma 'Password' incorreta
    public function testLoginEmptyPassword(AcceptanceTester $I)
    {
        $I->wait(3);
        $I->amOnPage('/site/login');

        $I->fillField(['name' => 'LoginForm[username]'], 'admin');
        $I->wait(1);
        $I->fillField(['name' => 'LoginForm[password]'], '');
        $I->wait(1);
        $I->click('#button-login');

        $I->wait(1);
        $I->see('Password cannot be blank.');
    }

    //Testa a tentativa de Login ao inserir uma 'Password' incorreta
    public function testLoginWrongPassword(AcceptanceTester $I)
    {
        $I->wait(3);
        $I->amOnPage('/site/login');

        $I->fillField(['name' => 'LoginForm[username]'], 'admin');
        $I->wait(1);
        $I->fillField(['name' => 'LoginForm[password]'], 'wrong');
        $I->wait(1);
        $I->click('#button-login');

        $I->wait(3);
        $I->see('Incorrect username or password.');
    }

    //Testa o Login ao inserir as credenciais corretas
    public function testLogin(AcceptanceTester $I)
    {
        $I->wait(3);
        $I->amOnPage('/site/login');

        $I->fillField(['name' => 'LoginForm[username]'], 'admin');
        $I->wait(1);
        $I->fillField(['name' => 'LoginForm[password]'], 'admin');
        $I->wait(1);
        $I->click('#button-login');

        $I->wait(1);
        $I->see('Logout (admin)');
        $I->wait(3);
    }

}
