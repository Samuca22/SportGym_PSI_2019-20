<?php namespace backend\tests;

use common\models\LinhaVenda;

class LinhasVendaTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {

        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 2;
        $linhaVenda->subTotal = 20.5;

        $linhaVenda->save();
    }

    protected function _after()
    {
    }

    // tests
    public function getLinhaVendaValida()
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 2;
        $linhaVenda->subTotal = 20.5;

        return $linhaVenda;
    }

    public function testLinhaVendaValido()
    {
        $linhaVenda = $this->getLinhaVendaValida();
        $this->assertTrue($linhaVenda->validate());
    }

    public function testQuantidadeVazio()  // verifica se o campo Quantidade pode ser igual a Vazio
    {
        $linhaVenda = $this->getLinhaVendaValida();
        $linhaVenda->quantidade = null;
        $this->assertFalse($linhaVenda->validate(['quantidade']));
    }

    public function testQuantidadeFloat()  // verifica se o campo Quantidade aceita Float
    {
        $linhaVenda = $this->getLinhaVendaValida();
        $linhaVenda->quantidade = 1.5;
        $this->assertFalse($linhaVenda->validate(['quantidade']));
    }


    public function testQuantidadeString()  // verifica se o campo Quantidade aceita String
    {
        $linhaVenda = $this->getLinhaVendaValida();
        $linhaVenda->quantidade = 'Linha de venda';
        $this->assertFalse($linhaVenda->validate(['quantidade']));
    }

    public function testsubTotalString()  // verifica se o campo subTotal aceita String
    {
        $linhaVenda = $this->getLinhaVendaValida();
        $linhaVenda->subTotal = 'SubTotal';
        $this->assertFalse($linhaVenda->validate(['subTotal']));
    }




}