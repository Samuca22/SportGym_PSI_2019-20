<?php namespace backend\tests;

use common\models\Venda;

class VendasTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {

        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 1;

        $venda->save();
    }

    protected function _after()
    {
    }

    // tests
    public function getVendaValida()
    {

        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = '2019-12-25';
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



    public function testVerificarVendaExiste() // Test para verificar se o produto extiste
    {

        $this->tester->seeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
    }


    public function testAtualizarVendaData()  // Verifica a alteração do campo dataVenda
    {

        $data_antiga = '2019-12-25';
        $data_nova = '2020-01-01';

        $this->tester->seeRecord(Venda::class, ['dataVenda' => $data_antiga]);
        $this->tester->dontSeeRecord(Venda::class, ['dataVenda' => $data_nova]);

        $venda = Venda::find()->where(['dataVenda' => $data_antiga])->one();
        $venda->dataVenda = $data_nova;
        $venda->save();

        $this->tester->seeRecord(Venda::class, ['dataVenda' => $data_nova]);
    }


/*
    public function testAtualizarVendaTotal()  // Verifica a alteração do campo Total
    {
        $total_antigo = 500;
        $total_novo = 499;

        $this->tester->seeRecord(Venda::class, ['total' => $total_antigo]);
        $this->tester->dontSeeRecord(Venda::class, ['total' => $total_novo]);

        $venda = Venda::find()->where(['total' => $total_antigo])->one();
        $venda->total = $total_novo;
        $venda->save();

        $this->tester->seeRecord(Venda::class,['total' => $total_novo]);
    }



 */
    public function testApagarVendaData() // Verifica se o produto foi apagado atravez do campo Data
    {
        $this->tester->seeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
        $venda = Venda::find()->where(['dataVenda' => '2019-12-25'])->one();
        $venda->delete();
        $this->tester->dontSeeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
    }


    public function testApagarVendaTotal() // Verifica se o produto foi apagado atravez do campo Total
    {
        $this->tester->seeRecord(Venda::class, ['total' => 500]);
        $venda = Venda::find()->where(['total' => 500])->one();
        $venda->delete();
        $this->tester->dontSeeRecord(Venda::class, ['total' => 500]);
    }



}
