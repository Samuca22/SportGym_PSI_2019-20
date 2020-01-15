<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class AulasCest
{
    //Antes de executar os teste o administador faz login
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('site/login');
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin');
        $I->click('Login', 'button');

        $I->see('Logout (admin)');
    }

    //Testa se após fazer o login está na página '/site/index'
    //Depois testa se ao carregar no Link => Gestão de Aulas, se vai para a página '/perfil-aula/index'
    public function PageMapaAulas(FunctionalTester $I)
    {
        $I->amOnPage('/site/index');
        $I->click(['link' => 'Gestão de Aulas']);
        $I->see('MAPA DE AULAS', 'h3');
    }

    //Testa o registo de um perfil a uma aula
    public function RegisterSocioAula(FunctionalTester $I)
    {
        $I->amOnPage('/perfil-aula/index');
        $I->fillField('PerfilAula[nSocio]', 1003);
        $I->selectOption('PerfilAula[IDaula]', 'Cycling - Segunda-Feira');
        $I->click('Inscrever', 'button');
        
        $I->see('1003 - Socio Oliveira');
    }

    //Testa o search dos perfis
    public function SearchPerfis(FunctionalTester $I)
    {
        $I->amOnPage('/perfil-aula/index');
        $I->fillField('PerfilSearch[global]', "1003");
        $I->click('Pesquisar', 'button');
        
        $I->see('Socio Oliveira');
    }

    //Testa o search dos perfis que têm aulas atribuidas
    public function SearchCancelarInscricoes(FunctionalTester $I)
    {
        $I->amOnPage('/perfil-aula/index');
        $I->fillField('PerfilAulaSearch[nSocio]', "1003");
        $I->click('Pesquisar', 'button');
        
        $I->see('1003 - Socio Oliveira');
    }
}
