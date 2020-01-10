<?php namespace backend\tests;

use common\models\LinhaVenda;
use common\models\Produto;
use common\models\Venda;

class LojaTest extends \Codeception\Test\Unit
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

    // TESTES DA LOJA

    //INICIALIZAÇÃO
    public function testIniciarVenda() //TESTE PARA VERIFICAÇÃO A INICIALIZAÇÃO DE UMA VENDA
    {
        $venda = new Venda();
        $venda->total = 0;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->save();

        $produto = new Produto();
        $produto->nome = 'shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 1;
        $produto->save();

        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        $linhaVenda->save();

        $this->tester->seeRecord(LinhaVenda::class, ['subTotal' => $produto->precoProduto * $linhaVenda->quantidade]);
        $this->tester->seeRecord(LinhaVenda::class, ['quantidade' => 1]);
    }


    //RETIRAR
    public function testRetirarQuantidadeLinhaVenda() //TESTE PARA RETIRAR QUANTIDADE À LINHA DE VENDA
    {

        $venda = new Venda();
        $venda->total = 0;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->save();

        $produto = new Produto();
        $produto->nome = 'shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 1;
        $produto->save();

        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        $linhaVenda->save();

        $linhaVenda->quantidade = 5;
        $linhaVenda->menosQuantidade();

        $this->tester->seeRecord(LinhaVenda::class, ['quantidade' => 4]);
    }


    public function testRetirarQuantidadeMaximaLinhaVenda() //TESTE PARA RETIRAR A QUANTIDADE MÁXIMA À LINHA DE VENDA
    {

        $venda = new Venda();
        $venda->total = 0;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->save();

        $produto = new Produto();
        $produto->nome = 'shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 1;
        $produto->save();

        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        $linhaVenda->save();

        //quantidade = 1
        $linhaVenda->menosQuantidade();
        //linha de venda apagada

        $this->tester->dontSeeRecord(LinhaVenda::class, ['IDlinhavenda' => $linhaVenda->IDlinhaVenda]);
    }


    //ADICIONAR
    public function testAdicionarQuantidadeLinhaVenda() //TESTE PARA ADICIONAR QUANTIDADE À LINHA DE VENDA
    {

        $venda = new Venda();
        $venda->total = 0;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->save();

        $produto = new Produto();
        $produto->nome = 'shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 1;
        $produto->save();

        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        $linhaVenda->save();

        // quantidade = 1
        $linhaVenda->maisQuantidade();
        // quantidade = 2

        $this->tester->seeRecord(LinhaVenda::class, ['quantidade' => 2]);
    }

    public function testAdicionarQuantidadeMaximaLinhaVenda() //TESTE PARA ADICIONAR QUANTIDADE MÁXIMA À LINHA DE VENDA
    {

        $venda = new Venda();
        $venda->total = 0;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->save();

        $produto = new Produto();
        $produto->nome = 'shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 1;
        $produto->save();

        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        $linhaVenda->save();

        $linhaVenda->quantidade = 15;
        $linhaVenda->maisQuantidade();


        $this->tester->dontSeeRecord(LinhaVenda::class, ['quantidade' => 16]);
    }


}