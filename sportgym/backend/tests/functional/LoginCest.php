<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * @param FunctionalTester $I
     */

     //Verifica se é possível fazer Login sem preencher os campos
    public function LoginEmptyFields(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', '');
        $I->fillField('LoginForm[password]', '');
        $I->click('Login', 'button');

        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }

    //Verifica se é possível fazer Login sem preencher o campo "Username"
    public function LoginEmptyUsername(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', '');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('Login', 'button');

        $I->see('Username cannot be blank');
    }

    //Verifica se é possível fazer Login a preencher com "Username" incorreto
    public function LoginWrongUsername(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', 'wrong');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('Login', 'button');

        $I->see('Incorrect username or password.');
    }

    //Verifica se é possível fazer Login sem preencher o campo "Password"
    public function LoginEmptyPassword(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', '');
        $I->click('Login', 'button');

        $I->see('Password cannot be blank');
    }

    //Verifica se é possível fazer Login a preencher com a "Password" incorreta
    public function LoginWrongPassword(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'wrong');
        $I->click('Login', 'button');

        $I->see('Incorrect username or password.');
    }

    //Verifica se um user com estatuto de "Sócio" consegue fazer Login no Back-Office
    public function tryLoginAsSocio(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', 'socio');
        $I->fillField('LoginForm[password]', 'socio');
        $I->click('Login', 'button');
        
        $I->see('Não tem permissão! Ou dados Incorretos!');
        $I->cantSee('Logout (socio)');
    }

    //Verifica se o Login com as credenciais de "Colaborador" corretas
    public function LoginSuccessfulColaborador(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', 'colab');
        $I->fillField('LoginForm[password]', 'colab');
        $I->click('Login', 'button');
        
        $I->see('Logout (admin)');
    }

    //Verifica se o Login com as credenciais de "Administrador" corretas
    public function LoginSuccessful(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('Login', 'button');
        
        $I->see('Logout (admin)');
    }
}
