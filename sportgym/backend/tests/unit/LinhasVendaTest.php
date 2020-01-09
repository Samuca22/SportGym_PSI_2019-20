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

    //INICIALIZAÇÃO  E VALIDAÇÃO
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


    //CAMPOS OBRIGATÓRIOS
    public function testQuantidadeVazio()  // verifica se o campo Quantidade pode ser igual a Vazio
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = null;
        $linhaVenda->subTotal = 20.5;

        $this->assertFalse($linhaVenda->validate());
    }


    //CAMPOS QUE NÃO SUPORTAM NRS DECIMAIS
    public function testQuantidadeFloat()  // verifica se o campo Quantidade aceita Float
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 1.5;
        $linhaVenda->subTotal = 20.5;

        $this->assertFalse($linhaVenda->validate());
    }


    //CAMPOS QUE NÃO SUPORTAM STRINGS
    public function testQuantidadeString()  // verifica se o campo Quantidade aceita String
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 'Quantidade';
        $linhaVenda->subTotal = 20.5;

        $this->assertFalse($linhaVenda->validate());
    }

    public function testsubTotalString()  // verifica se o campo subTotal aceita String
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 1.5;
        $linhaVenda->subTotal = 'SubTotal';

        $this->assertFalse($linhaVenda->validate());
    }


}