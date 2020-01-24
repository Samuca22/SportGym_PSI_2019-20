<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class DefinicoesCest
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
    //Depois testa se ao carregar no Link => Definições, se vai para a página '/definicoes/index-ginasios'
    public function testPageDefinicoesIndexGinasios(FunctionalTester $I)
    {
        $I->amOnPage('/site/index');
        $I->click(['link' => 'Definições']);
        $I->see('Ginásios', 'h4');
    }

    public function InsertNewGym(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', 'ourem@sportgym.pt');
        $I->fillField('Ginasio[telefone]', '249578321');
        $I->fillField('Ginasio[rua]', 'estrada de tras, n1');
        $I->fillField('Ginasio[localidade]', 'Ourem');
        $I->fillField('Ginasio[cp]', '2490-548');
        $I->click('Gravar', 'button');

        //3º - Verifica se o ginásio existe na base de dados
        $I->seeInDatabase('ginasio', ['localidade like' => 'Ourem']);
        $I->amOnPage('/definicoes/index-ginasios');
        $I->see('Atualizar Clube Ourem');
    }

    public function EditGym(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click('Atualizar Clube Leiria');
        $I->see('Atualizar Dados Clube - Leiria', 'h4');

        $I->fillField('Ginasio[localidade]', 'Leiria-Marrazes'); //Campo editado
        $I->click('Gravar', 'button');

        $I->seeInDatabase('ginasio', ['localidade like' => 'Leiria-Marrazes']);
        $I->see('Atualizar Clube Leiria-Marrazes');
    }

    public function CancelInsertNewGym(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', 'montijo@sportgym.pt');
        $I->fillField('Ginasio[telefone]', '210789648');
        $I->fillField('Ginasio[rua]', 'estrada de frente tras, n22');
        $I->fillField('Ginasio[localidade]', 'Montijo');
        $I->fillField('Ginasio[cp]', '2870-100');
        $I->click(['link' => 'Cancelar']);

        //3º - Verifica se o ginásio "Não Existe"
        $I->cantSeeInDatabase('ginasio', ['localidade like' => 'Montijo']);
        $I->amOnPage('/definicoes/index-ginasios');
    }

    public function InsertNewGymEmptyEmail(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', '');
        $I->fillField('Ginasio[telefone]', '210789648');
        $I->fillField('Ginasio[rua]', 'estrada de frente tras, n22');
        $I->fillField('Ginasio[localidade]', 'Montijo');
        $I->fillField('Ginasio[cp]', '2870-100');
        $I->click('Gravar', 'button');

        $I->see('Email cannot be blank.');
    }

    public function InsertNewGymEmptyTelefone(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', 'montijo@sportgym.pt');
        $I->fillField('Ginasio[telefone]', '');
        $I->fillField('Ginasio[rua]', 'estrada de frente tras, n22');
        $I->fillField('Ginasio[localidade]', 'Montijo');
        $I->fillField('Ginasio[cp]', '2870-100');
        $I->click('Gravar', 'button');

        $I->see('Telefone cannot be blank.');
    }

    public function InsertNewGymEmptyRua(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', 'montijo@sportgym.pt');
        $I->fillField('Ginasio[telefone]', '210789648');
        $I->fillField('Ginasio[rua]', '');
        $I->fillField('Ginasio[localidade]', 'Montijo');
        $I->fillField('Ginasio[cp]', '2870-100');
        $I->click('Gravar', 'button');

        $I->see('Rua cannot be blank.');
    }

    public function InsertNewGymEmptyLocalidade(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', 'montijo@sportgym.pt');
        $I->fillField('Ginasio[telefone]', '210789648');
        $I->fillField('Ginasio[rua]', 'estrada de frente tras, n22');
        $I->fillField('Ginasio[localidade]', '');
        $I->fillField('Ginasio[cp]', '2870-100');
        $I->click('Gravar', 'button');

        $I->see('Localidade cannot be blank.');
    }

    public function InsertNewGymEmptyCP(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', 'montijo@sportgym.pt');
        $I->fillField('Ginasio[telefone]', '210789648');
        $I->fillField('Ginasio[rua]', 'estrada de frente tras, n22');
        $I->fillField('Ginasio[localidade]', 'Montijo');
        $I->fillField('Ginasio[cp]', '');
        $I->click('Gravar', 'button');

        $I->see('Código Postal cannot be blank.');
    }

    public function InsertNewGymEmptyFields(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Novo Estabelecimento']);
        $I->see('Novo estabelecimento', 'h3');

        //2º - Tenta inserir um novo ginásio
        $I->fillField('Ginasio[email]', '');
        $I->fillField('Ginasio[telefone]', '');
        $I->fillField('Ginasio[rua]', '');
        $I->fillField('Ginasio[localidade]', '');
        $I->fillField('Ginasio[cp]', '');
        $I->click('Gravar', 'button');

        $I->see('Email cannot be blank.');
        $I->see('Telefone cannot be blank.');
        $I->see('Rua cannot be blank.');
        $I->see('Localidade cannot be blank.');
        $I->see('Código Postal cannot be blank.');
    }

    //======================================================================================================
    //Testa a edição dos dados pessoais
    public function EditProfile(FunctionalTester $I)
    {
        //1º - Verifica em que página está
        $I->amOnPage('/definicoes/index-ginasios');
        $I->click(['link' => 'Dados Pessoais']);
        $I->see('Dados Pessoais', 'h4');

        //2º - Carrega no botão "Editar Dados Pessoais"
        $I->click(['link' => 'Editar Dados Pessoais']);

        $I->fillField('Perfil[primeiroNome]', 'Administrador');
        $I->click('Gravar', 'button');

        $I->seeInDatabase('perfil', ['primeiroNome like' => 'Administrador']);
    }
}
