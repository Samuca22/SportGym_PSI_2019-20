<?php namespace backend\tests;

use common\models\Ginasio;

class GinasiosTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {

        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua da liberdade';
        $ginasio->localidade = 'Ourem';
        $ginasio->cp = '2490-232';
        $ginasio->telefone = '244323423';
        $ginasio->email = 'ourem@sportgym.pt';

        $ginasio->save();
    }

    protected function _after()
    {
    }

    // tests
    public function getGinasioValido()
    {

        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua da liberdade';
        $ginasio->localidade = 'Ourem';
        $ginasio->cp = '2490-232';
        $ginasio->telefone = '234323423';
        $ginasio->email = 'ouremm@sportgym.pt';

        return $ginasio;
    }

    public function testGinasioValido() //Verifica se o Ginasio é valido
    {
        $ginasio = $this->getGinasioValido();
        $this->assertTrue($ginasio->validate());
    }

    public function testRuaVazio() // verifica se o campo Rua pode ser igual a Vazio
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->rua = null;
        $this->assertFalse($ginasio->validate(['rua']));
    }

    public function testLocalidadeVazio() // verifica se o campo Localidade pode ser igual a Vazio
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->localidade = null;
        $this->assertFalse($ginasio->validate(['localidade']));
    }

    public function testCpVazio() // verifica se o campo cp pode ser igual a Vazio
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->cp = null;
        $this->assertFalse($ginasio->validate(['cp']));
    }

    public function testTelefoneVazio() // verifica se o campo Telefone pode ser igual a Vazio
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->telefone = null;
        $this->assertFalse($ginasio->validate(['telefone']));
    }

    public function testEmailVazio() // verifica se o campo Email pode ser igual a Vazio
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->email = null;
        $this->assertFalse($ginasio->validate(['email']));
    }

    public function testRuaDemasiadoLongo() // Verifica se o campo rua pode conter a quantida de chars inseridos
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->rua = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($ginasio->validate(['rua']));
    }

    public function testLocalidadeDemasiadoLongo() // Verifica se o campo Localidade pode conter a quantida de chars inseridos
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->localidade = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($ginasio->validate(['localidade']));
    }

    public function testEmailDemasiadoLongo() // Verifica se o campo Email pode conter a quantida de chars inseridos
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->email = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($ginasio->validate(['email']));
    }

    public function testCpDemasiadoLongo() // Verifica se o campo Cp pode conter a quantida de chars inseridos
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->cp = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($ginasio->validate(['cp']));
    }


    public function testTelefoneDemasiadoLongo() // Verifica se o campo Localidade pode conter a quantida de chars inseridos
    {
        $ginasio = $this->getGinasioValido();
        $ginasio->telefone = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($ginasio->validate(['telefone']));
    }

    public function testTelefoneRepetido() // Verifica se o campo telefone pode ser repetido
    {
        $ginasio = $this->getGinasioValido();

        $ginasio->telefone = '244323423';

        $this->assertFalse($ginasio->validate(['telefone']));
    }


    public function testEmailRepetido() // Verifica se o campo email pode ser repetido
    {
        $ginasio = $this->getGinasioValido();

        $ginasio->email = 'ourem@sportgym.pt';

        $this->assertFalse($ginasio->validate(['email']));
    }


    public function testEmailValidacao() // Verifica se o campo email é do tipo email
    {
        $ginasio = $this->getGinasioValido();

        $ginasio->email = 'ourem';

        $this->assertFalse($ginasio->validate(['email']));
    }


    public function testVerificarGinasioExiste() // Test para verificar se o Ginasio extiste
    {

        $this->tester->SeeRecord(Ginasio::class, ['email' => 'ourem@sportgym.pt']);
    }


    public function testAtualizarGinasioEmail()  // Verifica a alteração do campo Email
    {

        $email_antigo = 'ourem@sportgym.pt';
        $email_novo = 'vilaourem@sportgym.pt';

        $this->tester->seeRecord(Ginasio::class, ['email' => $email_antigo]);
        $this->tester->dontSeeRecord(Ginasio::class, ['email' => $email_novo]);

        $ginasio = Ginasio::find()->where(['email' => $email_antigo])->one();
        $ginasio->email = $email_novo;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['email' => $email_novo]);
    }


    public function testAtualizarGinasioTelefone()  // Verifica a alteração do campo Telefone
    {

        $telefone_antigo = '244323423';
        $telefone_novo = '243323423';

        $this->tester->seeRecord(Ginasio::class, ['telefone' => $telefone_antigo]);
        $this->tester->dontSeeRecord(Ginasio::class, ['telefone' => $telefone_novo]);

        $ginasio = Ginasio::find()->where(['telefone' => $telefone_antigo])->one();
        $ginasio->telefone = $telefone_novo;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['telefone' => $telefone_novo]);
    }


    public function testAtualizarGinasioRua()  // Verifica a alteração do campo Rua
    {

        $rua_antiga = 'Rua da liberdade';
        $rua_nova = 'Rua de S.Pedro';

        $this->tester->seeRecord(Ginasio::class, ['rua' => $rua_antiga]);
        $this->tester->dontSeeRecord(Ginasio::class, ['rua' => $rua_nova]);

        $ginasio = Ginasio::find()->where(['rua' => $rua_antiga])->one();
        $ginasio->rua = $rua_nova;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['rua' => $rua_nova]);
    }



    public function testAtualizarGinasioLocalidade()  // Verifica a alteração do campo localidade
    {

        $localidade_antiga = 'Ourem';
        $localidade_nova = 'Leiria';

        $this->tester->seeRecord(Ginasio::class, ['localidade' => $localidade_antiga]);
        $this->tester->dontSeeRecord(Ginasio::class, ['localidade' => $localidade_nova]);

        $ginasio = Ginasio::find()->where(['localidade' => $localidade_antiga])->one();
        $ginasio->localidade = $localidade_nova;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['localidade' => $localidade_nova]);
    }

    public function testAtualizarGinasioCp()  // Verifica a alteração do campo Cp
    {

        $cp_antigo = '2490-232';
        $cp_novo = '2490-400';

        $this->tester->seeRecord(Ginasio::class, ['cp' => $cp_antigo]);
        $this->tester->dontSeeRecord(Ginasio::class, ['cp' => $cp_novo]);

        $ginasio = Ginasio::find()->where(['cp' => $cp_antigo])->one();
        $ginasio->cp = $cp_novo;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['cp' => $cp_novo]);
    }


    public function testApagarGinasioEmail() // Verifica se o Ginasio foi apagado atravez do campo Email
    {
        $this->tester->seeRecord(Ginasio::class, ['email' => 'ourem@sportgym.pt']);
        $ginasio = Ginasio::find()->where(['email' => 'ourem@sportgym.pt'])->one();
        $ginasio->delete();
        $this->tester->dontSeeRecord(Ginasio::class, ['email' => 'ourem@sportgym.pt']);
    }

    public function testApagarGinasioTelefone() // Verifica se o Ginasio foi apagado atravez do campo Telefone
    {
        $this->tester->seeRecord(Ginasio::class, ['telefone' => '244323423']);
        $ginasio = Ginasio::find()->where(['telefone' => '244323423'])->one();
        $ginasio->delete();
        $this->tester->dontSeeRecord(Ginasio::class, ['telefone' => '244323423']);
    }

    public function testApagarGinasioRua() // Verifica se o Ginasio foi apagado atravez do campo Rua
    {
        $this->tester->seeRecord(Ginasio::class, ['rua' => 'Rua da liberdade']);
        $ginasio = Ginasio::find()->where(['rua' => 'Rua da liberdade'])->one();
        $ginasio->delete();
        $this->tester->dontSeeRecord(Ginasio::class, ['rua' => 'Rua da liberdade']);
    }

    public function testApagarGinasioLocalidade() // Verifica se o Ginasio foi apagado atravez do campo Localidade
    {
        $this->tester->seeRecord(Ginasio::class, ['localidade' => 'Ourem']);
        $ginasio = Ginasio::find()->where(['localidade' => 'Ourem'])->one();
        $ginasio->delete();
        $this->tester->dontSeeRecord(Ginasio::class, ['localidade' => 'Ourem']);
    }

    public function testApagarGinasioCp() // Verifica se o Ginasio foi apagado atravez do campo cp
    {
        $this->tester->seeRecord(Ginasio::class, ['cp' => '2490-232']);
        $ginasio = Ginasio::find()->where(['cp' => '2490-232'])->one();
        $ginasio->delete();
        $this->tester->dontSeeRecord(Ginasio::class, ['cp' => '2490-232']);
    }

}