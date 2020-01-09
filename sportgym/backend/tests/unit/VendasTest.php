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
        $venda->total = 0;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->save();
    }

    protected function _after()
    {

    }

    //INICIALIZAÇÃO  E VALIDAÇÃO
    public function getVendaValida()
    {
        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;

        return $venda;
    }

    public function testVendaValida() //Verifica se o Venda é valida
    {
        $venda = $this->getVendaValida();
        $this->assertTrue($venda->validate());
    }


    //CAMPOS OBRIGATÓRIOS
    public function testTotalVazio() // verifica se o campo Total pode ser igual a Vazio
    {
        $venda = new Venda();
        $venda->total = null;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;

        $this->assertFalse($venda->validate());
    }


    //CAMPOS QUE NÃO SUPORTAM STRINGS
    public function testTotalAceitaString()  // verifica se o campo Total pode aceitar Strings
    {
        $venda = new Venda();
        $venda->total = 'Dinheiro';
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;

        $this->assertFalse($venda->validate());
    }

    public function testDataAceitaString()  // verifica se o campo DataVenda pode aceitar Strings
    {
        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = 'Data';
        $venda->estado = 0;

        $this->assertFalse($venda->validate());
    }


    //CAMPOS QUE NÃO SUPORTAM NRS DECIMAIS
    public function testEstadoAceitaFloat()  // verifica se o campo Estado pode aceitar float
    {
        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 1.5;

        $this->assertFalse($venda->validate());
    }


    //VALIDAÇÃO DO TIPO DATA
    public function testDataValidacao()  // verifica se o campo DataVenda é do tipo data
    {
        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = '2019-22-225';
        $venda->estado = 0;

        $this->assertFalse($venda->validate());
    }


    //VALIDAÇÃO SE A VENDA EXISTE
    public function testVerificarVendaExiste() // Test para verificar se a Venda existe
    {
        $this->tester->seeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
    }


    //ALTERAÇÃO DE CAMPOS
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


    //REMOÇÃO DE CAMPOS
    public function testApagarVendaData() // Verifica se o produto foi apagado atravez do campo dataVenda
    {
        $this->tester->seeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
        $venda = Venda::find()->where(['dataVenda' => '2019-12-25'])->one();
        $venda->delete();
        $this->tester->dontSeeRecord(Venda::class, ['dataVenda' => '2019-12-25']);
    }


}
