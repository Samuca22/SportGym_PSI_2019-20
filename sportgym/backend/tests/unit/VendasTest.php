<?php namespace backend\tests;

use common\models\Produto;
use common\models\Venda;

class VendasTest extends \Codeception\Test\Unit
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
    public function getVendaValida()
    {

        $venda = new Venda();
        $venda->dataVenda = '2019-12-25';
        $venda->total = 500;
        $venda->estado = 1;


        return $venda;
    }

    public function testVendaValida() //Verifica se o Venda é valida
    {
        $venda = $this->getVendaValida();
        $this->assertTrue($venda->validate());
    }


    public function testTotalVazio() // verifica se o campo Total pode ser igual a Vazio
    {
        $venda = $this->getVendaValida();
        $venda->total = null;
        $this->assertFalse($venda->validate(['total']));
    }

    public function testTotalAceitaString()  // verifica se o campo Total pode aceitar Strings
    {
        $venda = $this->getVendaValida();
        $venda->total = "Dinheiro";
        $this->assertFalse($venda->validate(['total']));
    }

    public function testDataAceitaString()  // verifica se o campo DataVenda pode aceitar Strings
    {
        $venda = $this->getVendaValida();
        $venda->dataVenda = "Data";
        $this->assertFalse($venda->validate(['dataVenda']));
    }

    public function testEstadoAceitaFloat()  // verifica se o campo Total pode aceitar Strings
    {
        $venda = $this->getVendaValida();
        $venda->estado = 1.5;
        $this->assertFalse($venda->validate(['estado']));
    }

    public function testDataValidacao()  // verifica se o campo DataVenda é do tipo data
    {
        $venda = $this->getVendaValida();
        $venda->dataVenda = "23123-22-40";
        $this->assertFalse($venda->validate(['dataVenda']));
    }


    public function testGravarVendaValida() // Gravar a Venda
    {

        $venda = new Venda();
        $venda->dataVenda = '2019-12-25';
        $venda->total = 500;
        $venda->estado = 1;

        $venda->save() ;
    }



    public function testVerificarVendaExiste() // Test para verificar se o produto extiste
    {
        $produto = $this->testGravarVendaValida();

        $this->tester->seeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
    }


}
