<?php namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class HomeCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('/site/login');
        $I->submitForm('#login-form', [
            'LoginForm[username]' => 'admin',
            'LoginForm[password]' => 'admin',
        ]);
        $I->see('Logout (admin)');
    }


    public function testVerificaoLoginIndex(FunctionalTester $I)
    {
        $I->see('Bem Vindo', 'h3'); //pagina Home
    }

    public function testBtnLeiria(FunctionalTester $I)
    {
        $I->click(['link' => 'Leiria-Marrazes']);
        $I->see('Ginásios', 'h4');
    }

    public function testBtnLisboa(FunctionalTester $I)
    {

        $I->click(['link' => 'Lisboa']);
        $I->see('Ginásios', 'h4');
    }

    public function testBtnPorto(FunctionalTester $I)
    {

        $I->click(['link' => 'Porto']);
        $I->see('Ginásios', 'h4');
    }

}
