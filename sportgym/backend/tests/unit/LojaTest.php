<?php namespace backend\tests;

use common\models\LinhaVenda;
use common\models\Produto;
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

    //CAMPOS OBRIGATÓRIOS
    public function testQuantidadeVazio()  // verifica se o campo Quantidade pode ser igual a Vazio
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = '';

        $this->assertFalse($linhaVenda->validate(['quantidade']));
    }

    public function testSubTotalVazio()  // verifica se o campo Quantidade pode ser igual a Vazio
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->subTotal = '';

        $this->assertFalse($linhaVenda->validate(['subTotal']));
    }


    //INT E FLOAT
    public function testQuantidadeFloat()  // verifica se o campo Quantidade aceita Float
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 1.5;

        $this->assertFalse($linhaVenda->validate(['quantidade']));
    }

    public function testSubTotalFloatInt()  // verifica se o campo Quantidade aceita Float
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->subTotal = 1.5;

        $this->assertTrue($linhaVenda->validate(['subTotal']));

        $linhaVenda->subTotal = 1;

        $this->assertTrue($linhaVenda->validate(['subTotal']));
    }


    //CAMPOS QUE NÃO SUPORTAM STRINGS
    public function testQuantidadeString()  // verifica se o campo Quantidade aceita String
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->quantidade = 'Quantidade';

        $this->assertFalse($linhaVenda->validate(['quantidade']));
    }

    public function testsubTotalString()  // verifica se o campo subTotal aceita String
    {
        $linhaVenda = new LinhaVenda();
        $linhaVenda->subTotal = 'SubTotal';

        $this->assertFalse($linhaVenda->validate(['subTotal']));
    }


    // Cria/Simula uma venda
    public function IniciarVenda() 
    {
        $produto = new Produto();
        $produto->nome = 'Gomas';
        $produto->descricao = "Gomas Multicolor";
        $produto->precoProduto = 5;
        $produto->estado = 1;
        $produto->save();

        $venda = new Venda();
        $venda->iniciarVenda(1);

        $linhaVenda = new LinhaVenda();
        $linhaVenda->iniciarLinhaVenda($venda->IDvenda, $produto);
        $linhaVenda->save();

        $venda->atualizarVenda();

        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'subTotal' => $produto->precoProduto * $linhaVenda->quantidade]);
        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 1]);
        $this->tester->seeRecord(Venda::class, ['IDvenda' => $venda->IDvenda, 'total' => $venda->total]);

        return $linhaVenda;
    }
    
    // verifica método maisQuantidade() do modelo LinhaVenda
    public function testAdicionarQuantidadeLinhaVenda()
    {
        $linhaVenda = $this->IniciarVenda();

        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 1]);
        // quantidade = 1
        $linhaVenda->maisQuantidade();
        // quantidade = 2

        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 2]);
        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }

    // verifica método menosQuantidade() do modelo LinhaVenda
    public function testRetirarQuantidadeLinhaVenda() 
    {
        $linhaVenda = $this->IniciarVenda();
        $linhaVenda->maisQuantidade();

        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 2]);
        // quantidade = 2
        $linhaVenda->menosQuantidade();
        // quantidade = 1

        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 1]);
        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }

    // Verifica que ao reduzir a quantidade de produtos a 0 apaga a linha de venda
    public function testRetirarQuantidadeMinimaLinhaVenda()
    {
        $linhaVenda = $this->IniciarVenda();
        $venda = Venda::findOne($linhaVenda->IDvenda);
        $produto = Produto::findOne($linhaVenda->IDproduto);

        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 1]);
        // quantidade = 1
        $linhaVenda->menosQuantidade();
        // quantidade = Apagar Linha Venda

        $this->tester->dontSeeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda]);
        $venda->delete();
        $produto->delete();
    }

    // Verifica que a máxima quantidade de produtos numa linha de venda é 15
    public function testAdicionarQuantidadeMaximaLinhaVenda() 
    {
        $linhaVenda = $this->IniciarVenda();
        for($i = 2; $i <= 20; $i++)
        {
            $linhaVenda->maisQuantidade();
            // Quantidade Máxima 15
        }
 
        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'quantidade' => 15]);
        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }
    
    // verifica atualização do campo 'subTotal' da linha de venda
    public function testAtualizarLinhaVendaSubTotal() 
    {
        $linhaVenda = $this->IniciarVenda();
        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'subTotal' => 5]);
        
        $linhaVenda->maisQuantidade();
 
        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'subTotal' => 10]);
        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }
}