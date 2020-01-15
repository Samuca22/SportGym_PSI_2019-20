<?php

namespace backend\tests;

use common\models\LinhaVenda;
use common\models\Venda;

class LinhasVendaTest extends \Codeception\Test\Unit
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

    //Cria uma Venda para se poder adicionar à linhaVenda
    protected function testCriarVenda()
    {
        $venda = new Venda();
        $venda->iniciarVenda(1);

        $this->assertTrue($venda->validate() && $venda->save());

        return $venda;
    }

    //INICIALIZAÇÃO E VALIDAÇÃO
    public function testLinhaVendaValido()
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 0;
        $linhaVenda->subTotal = 0;
        $linhaVenda->IDvenda = 1;
        $linhaVenda->IDproduto = 1;

        $this->assertTrue($linhaVenda->validate());

        return $linhaVenda;
    }

    protected function testCriarLinhaVenda()
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda(1, 1);

        $this->assertTrue($linhaVenda->validate() && $linhaVenda->save());
    }

    //CAMPOS OBRIGATÓRIOS
    public function testQuantidadeVazia()  // verifica se o campo Quantidade pode ser igual a Vazio
    {
        $linhaVenda = $this->testLinhaVendaValido();
        $linhaVenda->quantidade = '';

        $this->assertFalse($linhaVenda->validate(['quantidade']));
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
