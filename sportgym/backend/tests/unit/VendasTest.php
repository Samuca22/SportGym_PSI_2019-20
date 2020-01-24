<?php namespace backend\tests;

use common\models\LinhaVenda;
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

    public function testVendaValida() //Verifica se o Venda é valida
    {
        $venda = new Venda();
        $venda->total = 500;
        $venda->dataVenda = '2019-12-25';
        $venda->estado = 0;
        $venda->IDperfil = 1;

        $this->assertTrue($venda->validate());
    }

    //CAMPOS OBRIGATÓRIOS
    public function testTotalVazio() // verifica se o campo Total pode ser igual a Vazio
    {
        $venda = new Venda();
        $venda->total = '';

        $this->assertFalse($venda->validate('total'));
    }


    //CAMPOS QUE NÃO SUPORTAM STRINGS
    public function testTotalAceitaString()  // verifica se o campo Total pode aceitar Strings
    {
        $venda = new Venda();
        $venda->total = 'Dinheiro';

        $this->assertFalse($venda->validate('total'));
    }

    public function testDataAceitaString()  // verifica se o campo DataVenda pode aceitar Strings
    {
        $venda = new Venda();
        $venda->dataVenda = 'Data';

        $this->assertFalse($venda->validate('dataVenda'));
    }


    //CAMPOS QUE NÃO SUPORTAM NRS DECIMAIS
    public function testEstadoAceitaFloat()  // verifica se o campo Estado pode aceitar float
    {
        $venda = new Venda();
        $venda->estado = 1.5;

        $this->assertFalse($venda->validate(['estado']));
    }


    //VALIDAÇÃO DO TIPO DATA
    public function testDataValidacao()  // verifica se o campo DataVenda é do tipo data
    {
        $venda = new Venda();
        $venda->dataVenda = '2019-22-225';

        $this->assertFalse($venda->validate(['dataVenda']));
    }


    //VALIDAÇÃO SE A VENDA EXISTE
    public function testVerificarVendaExiste() // Test para verificar se a Venda existe
    {
        $linhaVenda = $this->IniciarVenda();
        $this->tester->seeRecord(Venda::class, ['IDvenda' => $linhaVenda->IDvenda]);
        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }


    public function testAtualizarVendaTotal() //TESTE PARA VERIFICAR ATUALIZAÇÃO DO CAMPO TOTAL NA VENDA
    {
        $linhaVenda = $this->IniciarVenda();
        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'subTotal' => 5]);
        
        $linhaVenda->maisQuantidade();
        $this->tester->seeRecord(LinhaVenda::class, ['IDlinhaVenda' => $linhaVenda->IDlinhaVenda, 'subTotal' => 10]);

        $linhaVenda->iDvenda->atualizarVenda();
        $this->tester->seeRecord(Venda::class, ['IDvenda' => $linhaVenda->IDvenda, 'total' => 10]);


        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }

    public function testFinalizarVenda() //TESTE PARA FINALIZAR VENDA (estado = 1)
    {
        $linhaVenda = $this->IniciarVenda();

        $linhaVenda->iDvenda->finalizarVenda(1);
        $this->tester->seeRecord(Venda::class, ['IDvenda' => $linhaVenda->IDvenda, 'estado' => 1]);


        $linhaVenda->delete();
        $linhaVenda->iDproduto->delete();
        $linhaVenda->iDvenda->delete();
    }
}
