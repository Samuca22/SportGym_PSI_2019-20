<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class GinasioCest
{
    public function _before(FunctionalTester $I)
    {
        $user = \common\models\User::findByUsername('admin');
        $I->amLoggedInAs($user);
        $I->amOnPage('/definicoes/index-ginasios');
    }

    // tests
    public function testCreateGinasio(FunctionalTester $I)
    {
        $I->click('novo-estabelecimento-button');
        $I->amOnPage('/definicoes/create-ginasio');
        $I->fillField('email', 'leiria@sportgym.pt');
        $I->fillField('telefone', '240550620');
        $I->fillField('rua', 'Rua de Leiria');
        $I->fillField('localidade', 'Leiria');
        $I->fillField('cp', '2400-120');
        $I->click('criar-ginasio-button');
        $I->haveRecord('common\models\Ginasio', array('email' => 'leiria@sportgym.pt'));
        $I->seeRecord('common\models\Ginasio', array('email' => 'leiria@sportgym.pt'));
    }
}
