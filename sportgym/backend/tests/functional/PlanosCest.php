<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;

class PlanosCest
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


    //VERIFICAR SE ENTRA NAS PÁGINAS
    public function testVerificaoLoginIndex(FunctionalTester $I)   //Verificar se o utilizador se autenticou
    {
        $I->see('Bem Vindo', 'h3'); //pagina Home
    }

    public function testPlanoTreinoIndex(FunctionalTester $I) //Verificar se o utilizador consegue navegar até à página Planos de Treino
    {
        $I->click('Gestão de Planos', 'a.dropdown-toggle');
        $I->click(['link' => 'Planos Treino']);
        $I->see('Planos de Treino', 'h3');
    }

    public function testPlanoNutricaoIndex(FunctionalTester $I) //Verificar se o utilizador consegue navegar até à página Planos de Nutrição
    {
        $I->click('Gestão de Planos', 'a.dropdown-toggle');
        $I->click(['link' => 'Planos Nutrição']);
        $I->see('Planos de Nutrição', 'h3');
    }

    public function testPlanoPerfilPlanoIndex(FunctionalTester $I) //Verificar se o utilizador consegue navegar até à página Atribuir Plano
    {
        $I->click('Gestão de Planos', 'a.dropdown-toggle');
        $I->click(['link' => 'Atribuir Planos']);
        $I->see('Atribuir Planos', 'h3');
    }


    //CRIAR PLANOS
    public function testInsertNewPlanoTreino(FunctionalTester $I) //Criar Plano de Treino
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-treino');
        $I->click(['link' => 'Criar Novo Plano']);
        $I->see('Criar Plano', 'h4');

        //2º -  inserir um novo plano-Treino
        $I->fillField('Plano[nome]', 'Off-Season');
        $I->selectOption("Tipo de Plano", 'Treino');
        $I->fillField('Plano[descricao]', 'Teste funcional');
        $I->click('Gravar', 'button');
        $I->see('Plano criado com sucesso');


        //3º - Verifica se o plano-treino ficou registado na  base de dados
        $I->seeInDatabase('plano', ['descricao like' => 'Teste funcional']);
        $I->see('Plano de Treino');
    }

    public function testInsertNewPlanoNutricao(FunctionalTester $I) //Criar Plano de Nutrição
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-nutricao');
        $I->click(['link' => 'Criar Novo Plano']);
        $I->see('Criar Plano', 'h4');

        //2º -  inserir um novo plano-Nutrição
        $I->fillField('Plano[nome]', 'Perder Peso');
        $I->selectOption("Tipo de Plano", 'Nutrição');
        $I->fillField('Plano[descricao]', 'Teste funcional Nutricao');
        $I->click('Gravar', 'button');
        $I->see('Plano criado com sucesso');


        //3º - Verifica se o plano-treino ficou registado na  base de dados
        $I->seeInDatabase('plano', ['descricao like' => 'Teste funcional Nutricao']);
        $I->see('Plano de Nutrição');
    }


    //EDITAR PLANOS
    public function TestEditPlanoTreino(FunctionalTester $I)  //Editar Plano de Treino
    {
        $I->amOnPage('/plano/view?id=2');
        $I->see('Plano de Treino: Sportgym_Treino - Musculação', 'h4');
        $I->click(['link' => 'Editar']);
        $I->see('Plano de Treino: Sportgym_Treino - Musculação', 'h4');


        $I->fillField('Plano[descricao]', 'Plano de Musculacao'); //Campo editado
        $I->click('Gravar', 'button');

        $I->seeInDatabase('plano', ['descricao like' => 'Plano de Musculacao']);
        $I->see('Plano de Treino: Sportgym_Treino - Musculação');
    }

    public function TestEditPlanoNutricao(FunctionalTester $I)  //Editar Plano de Nutricao
    {
        $I->amOnPage('/plano/view?id=1');
        $I->see('Plano de Nutrição: Sportgym_Nutrição - Tonificar', 'h4');
        $I->click(['link' => 'Editar']);
        $I->see('Plano de Nutrição: Sportgym_Nutrição - Tonificar', 'h4');


        $I->fillField('Plano[descricao]', 'Plano de Nutricao'); //Campo editado
        $I->click('Gravar', 'button');

        $I->seeInDatabase('plano', ['descricao like' => 'Plano de Nutricao']);
        $I->see('Plano de Nutrição: Sportgym_Nutrição - Tonificar');
    }


    // ATRIBUIR PLANOS
    public function testAtribuirPlano(FunctionalTester $I) //Atribuição Plano
    {
        //1º - Verifica em que página está
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano de treino
        $I->fillField('PerfilPlano[nSocio]', '1000');
        $I->selectOption('Nome do Plano', 'Sportgym_Treino - Musculação');
        $I->fillField('PerfilPlano[dtaplano]', '2020-01-05');
        $I->click('Atribuir Plano', 'button');
        $I->see('Inscrição realizada com sucesso');

        //3º - Verifica se o plano  ficou atribuido
        $I->seeInDatabase('perfilplano', ['dtaplano like' => '2020-01-05']);
    }

    public function testAtribuirPlanoRepetido(FunctionalTester $I) //Atribuição Plano Repetido
    {
        //1º - Verifica em que página está
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano de treino
        $I->fillField('PerfilPlano[nSocio]', '1000');
        $I->selectOption('Nome do Plano', 'Sportgym_Treino - Musculação');
        $I->fillField('PerfilPlano[dtaplano]', '2020-01-05');
        $I->click('Atribuir Plano', 'button');
        $I->see('Este plano já se encontra atribuído ao sócio inserid');
    }



    //Atribuir Valores Vazios
    public function testInsertNewPlanoTreinoEmpty(FunctionalTester $I) //Tentar criar um novo plano treino vazio
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-treino');
        $I->click(['link' => 'Criar Novo Plano']);
        $I->see('Criar Plano', 'h4');

        //2º -  inserir um novo plano-Treino
        $I->fillField('Plano[nome]', '');
        $I->selectOption("Tipo de Plano", '');
        $I->fillField('Plano[descricao]', '');
        $I->click('Gravar', 'button');

        $I->see('Introduza um nome para o plano');
        $I->see('Selecione o tipo de plano');
        $I->see('Introduza a descrição do plano');
    }

    public function testInsertNewPlanoTreinoEmptyNome(FunctionalTester $I) //Tentar criar um novo plano treino sem inserir o nome
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-treino');
        $I->click(['link' => 'Criar Novo Plano']);
        $I->see('Criar Plano', 'h4');

        //2º -  inserir um novo plano-Treino
        $I->fillField('Plano[nome]', '');
        $I->selectOption("Tipo de Plano", 'Treino');
        $I->fillField('Plano[descricao]', 'Teste funcional');
        $I->click('Gravar', 'button');

        $I->see('Introduza um nome para o plano');
    }

    public function testInsertNewPlanoTreinoEmptyTipo(FunctionalTester $I) //Tentar criar um novo plano treino sem inserir o tipo
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-treino');
        $I->click(['link' => 'Criar Novo Plano']);
        $I->see('Criar Plano', 'h4');

        //2º -  inserir um novo plano-Treino
        $I->fillField('Plano[nome]', 'Off-Season');
        $I->selectOption("Tipo de Plano", '');
        $I->fillField('Plano[descricao]', 'Teste funcional');
        $I->click('Gravar', 'button');

        $I->see('Selecione o tipo de plano');
    }

    public function testAtribuirPlanoEmpty(FunctionalTester $I) //Tentar Atribuir um plano com os campos vazios
    {
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano
        $I->fillField('PerfilPlano[nSocio]', '');
        $I->selectOption('Nome do Plano', '');
        $I->fillField('PerfilPlano[dtaplano]', '');
        $I->click('Atribuir Plano', 'button');

        $I->see('Introduza o número de sócio');
        $I->see('Introduza um plano válido');
        $I->see('Introduza a data em que o plano foi atribuido');
    }

    public function testAtribuirPlanoNomePlanoEmpty(FunctionalTester $I) //Tentar Atribuit um plano sem inserir o Nome do Plano
    {
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano
        $I->fillField('PerfilPlano[nSocio]', '1000');
        $I->selectOption('Nome do Plano', '');
        $I->fillField('PerfilPlano[dtaplano]', '2020-01-15');
        $I->click('Atribuir Plano', 'button');
        $I->see('Introduza um plano válido');

        $I->see('Atribuir Planos', 'h3');
    }

    public function testAtribuirPlanoNsocioEmpty(FunctionalTester $I) //Tentar Atribuit um plano sem inserir o NªSocio
    {
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano
        $I->fillField('PerfilPlano[nSocio]', '');
        $I->selectOption('Nome do Plano', 'Sportgym_Nutrição - Tonificar');
        $I->fillField('PerfilPlano[dtaplano]', '2020-01-15');
        $I->click('Atribuir Plano', 'button');
        $I->see('Introduza o número de sócio');

        $I->see('Atribuir Planos', 'h3');
    }

    public function testAtribuirPlanoDataEmpty(FunctionalTester $I) //Tentar Atribuir um plano sem inserir o Data
    {
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano
        $I->fillField('PerfilPlano[nSocio]', '1000');
        $I->selectOption('Nome do Plano', 'Sportgym_Nutrição - Tonificar');
        $I->fillField('PerfilPlano[dtaplano]', '');
        $I->click('Atribuir Plano', 'button');
        $I->see('Introduza a data em que o plano foi atribuido');

        $I->see('Atribuir Planos', 'h3');
    }


    //TESTAR VALORES INVÁLIDOS
    public function testAtribuirPlanoNsocioInvalido(FunctionalTester $I) //Tentar Atribuir um plano com NºSocio invalido
    {
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano
        $I->fillField('PerfilPlano[nSocio]', '12323123');
        $I->selectOption('Nome do Plano', 'Sportgym_Nutrição - Tonificar');
        $I->fillField('PerfilPlano[dtaplano]', '2020-01-15');
        $I->click('Atribuir Plano', 'button');
        $I->see('Sócio não existe');

        $I->see('Atribuir Planos', 'h3');
    }

    public function testAtribuirPlanoDataInvalida(FunctionalTester $I) //Tentar Atribuir um plano com Data invalido
    {
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Atribuir um plano
        $I->fillField('PerfilPlano[nSocio]', '1000');
        $I->selectOption('Nome do Plano', 'Sportgym_Nutrição - Tonificar');
        $I->fillField('PerfilPlano[dtaplano]', 'xxxxxx');
        $I->click('Atribuir Plano', 'button');
        $I->see('aaaa-mm-dd');

        $I->see('Atribuir Planos', 'h3');
    }


    //TESTAR PESQUISA
    public function testSearchPlanoTreino(FunctionalTester $I) //Pesquisa Plano treino
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-treino');
        $I->see('Planos de Treino ', 'h3');

        //2º -  Procurar um plano-Treino
        $I->fillField('PlanoSearch[nome]', "Sportgym_Treino - Musculação");
        $I->click('Pesquisar', 'button');
        $I->see('Sportgym_Treino - Musculação');
    }

    public function testSearchPlanoTreinoRandom(FunctionalTester $I) //Pesquisa Plano treino Random
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-treino');
        $I->see('Planos de Treino ', 'h3');

        //2º -  Procurar um plano-Treino
        $I->fillField('PlanoSearch[nome]', "random");
        $I->click('Pesquisar', 'button');
        $I->dontSee('random');
    }


    public function testSearchPlanoNutricao(FunctionalTester $I) //Pesquisa Plano Nutrição
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-nutricao');
        $I->see('Planos de Nutrição ', 'h3');

        //2º -  Procurar um plano-Nutrição
        $I->fillField('PlanoSearch[nome]', "Sportgym_Nutrição - Tonificar");
        $I->click('Pesquisar', 'button');
        $I->see('Sportgym_Nutrição - Tonificar');
    }

    public function testSearchPlanoNutricaoRandom(FunctionalTester $I) //Pesquisa Plano treino Random
    {
        //1º - Verifica em que página está
        $I->amOnPage('/plano/index-nutricao');
        $I->see('Planos de Nutrição ', 'h3');

        //2º -  Procurar um plano-Nutrição
        $I->fillField('PlanoSearch[nome]', "random");
        $I->click('Pesquisar', 'button');
        $I->dontSee('random');
    }

    public function testSearchAtribuirPlanoNsocio(FunctionalTester $I) //Pesquisa PlanoAtribuido por o N de Socio
    {
        //1º - Verifica em que página está
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Procurar um plano atribuido
        $I->fillField('PerfilSearch[global]', "1000"); //Procurar pelo NºSócio
        $I->click('Pesquisar', 'button');
        $I->see('Administrador Marques');  //Nome que está associado ao NºSócio inserido
    }

    public function testSearchAtribuirPlanoNif(FunctionalTester $I) //Pesquisa PlanoAtribuido por o NIF
    {
        //1º - Verifica em que página está
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');

        //2º -  Procurar um plano atribuido
        $I->fillField('PerfilSearch[global]', "21111111"); //Procurar pelo NIF
        $I->click('Pesquisar', 'button');
        $I->see('Administrador Marques');  //Nome que está associado ao NIF inserido
    }

    public function testSearchAtribuirPlanoRandom(FunctionalTester $I) //Pesquisa Plano treino Random
    {
        //1º - Verifica em que página está
        $I->amOnPage('/perfil-plano/index');
        $I->see('Atribuir Planos', 'h3');


        //2º -  Procurar umplano atribuido
        $I->fillField('PerfilSearch[global]', "random");
        $I->click('Pesquisar', 'button');
        $I->dontSee('random');
    }
}
