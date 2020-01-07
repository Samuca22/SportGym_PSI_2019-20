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
        $ginasio->telefone = '244323423';
        $ginasio->email = 'ourem@sportgym.pt';

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

    public function testEmailValidacao() // Verifica se o campo email é do tipo email
    {
        $ginasio = $this->getGinasioValido();

        $ginasio->email = 'ourem';

        $this->assertFalse($ginasio->validate(['email']));
    }


    public function testGravarGinasioValido() // Gravar o ginasio
    {

        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua da liberdade';
        $ginasio->localidade = 'Ourem';
        $ginasio->cp = '2490-232';
        $ginasio->telefone = '244323423';
        $ginasio->email = 'ourem@sportgym.pt';

        $ginasio->save() ;
    }

    public function testVerificarGinasioExiste() // Test para verificar se o Ginasio extiste
    {
        $ginasio = $this->testGravarGinasioValido();

        $this->tester->SeeRecord(Ginasio::class, ['email' => 'ourem@sportgym.pt']);
    }



/*
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


*/


}