<?php namespace backend\tests;


use common\models\Produto;

class ProdutosTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = 'shaker azul';
        $produto->precoProduto = 5;
        $produto->estado = 1;

        $produto->save();

    }

    protected function _after()
    {
    }

    // tests
    public function getProdutoValido()
    {

        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = 'shake azul';
        $produto->precoProduto = 5;
        $produto->estado = 1;

        return $produto;
    }


    public function testProdutoValido() //Verifica se o Produto é valido
    {
        $produto = $this->getProdutoValido();
        $this->assertTrue($produto->validate());
    }

    public function testNomeVazio()  // verifica se o campo Nome pode ser igual a Vazio
    {
        $produto = $this->getProdutoValido();
        $produto->nome = null;
        $this->assertFalse($produto->validate(['nome']));
    }

    public function testEstadoVazio() // verifica se o campo Estado pode ser igual a Vazio
    {
        $produto = $this->getProdutoValido();
        $produto->estado = null;
        $this->assertTrue($produto->validate(['estado']));
    }

    public function testDescricaoVazia()  // verifica se o campo Descrição pode ser igual a Vazio
    {
        $produto = $this->getProdutoValido();
        $produto->descricao = null;
        $this->assertFalse($produto->validate(['descricao']));
    }

    public function testFotovazia()  // verifica se o campo fotoProduto pode ser igual a Vazio
    {
        $produto = $this->getProdutoValido();
        $produto->fotoProduto = null;
        $this->assertTrue($produto->validate(['fotoProduto']));
    }

    public function testPreco()  // verifica se o campo precoProduto pode ser igual a Vazio
    {
        $produto = $this->getProdutoValido();
        $produto->precoProduto = null;
        $this->assertFalse($produto->validate(['precoProduto']));
    }

    public function testNomeDemasiadoLongo() // Verifica se o campo Nome pode conter a quantida de chars inseridos
    {
        $produto = $this->getProdutoValido();
        $produto->nome = "asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($produto->validate(['nome']));
    }

    public function testDescricaoDemasidoLongo() // Verifica se o campo Nome pode conter a quantida de chars inseridos
    {
        $produto = $this->getProdutoValido();
        $produto->descricao = "asssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($produto->validate(['descricao']));
    }

    public function testFotoDemasiadoLongo() // Verifica se o campo Nome fotoProduto conter a quantida de chars inseridos
    {
        $produto = $this->getProdutoValido();
        $produto->fotoProduto = "asssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $this->assertFalse($produto->validate(['fotoProduto']));
    }


    public function testPrecoAceitaString()  // verifica se o campo precoProduto pode aceitar Strings
    {
        $produto = $this->getProdutoValido();
        $produto->precoProduto = "Dinheiro";
        $this->assertFalse($produto->validate(['precoProduto']));
    }

    public function testEstadoAceitaString()  // verifica se o campo estado pode aceitar Strings
    {
        $produto = $this->getProdutoValido();
        $produto->estado = "estado";
        $this->assertFalse($produto->validate(['estado']));
    }

    public function testEstadoAceitaFloat()  // verifica se o campo estado aceita Float
    {
        $produto = $this->getProdutoValido();
        $produto->estado = 1.5;
        $this->assertFalse($produto->validate(['estado']));
    }


    public function testVerificarNomeExiste() // Test para verificar se o produto extiste
    {

        $this->tester->seeRecord(Produto::class, ['nome' => 'Shaker']);
    }


    public function testAtualizarProdutoNome()  // Verifica a alteração do campo Nome
    {

        $nome_antigo = 'Shaker';
        $nome_novo = 'Shaker 400ml';

        $this->tester->seeRecord(Produto::class, ['nome' => $nome_antigo]);
        $this->tester->dontSeeRecord(Produto::class, ['nome' => $nome_novo]);

        $produto = Produto::find()->where(['nome' => $nome_antigo])->one();
        $produto->nome = $nome_novo;
        $produto->save();

        $this->tester->seeRecord(Produto::class, ['nome' => $nome_novo]);

    }


    public function testAtualizarProdutoDescricao()  // Verifica a alteração do campo Descrição
    {

        $descricao_antigo = 'shaker azul';
        $descricao_nova = 'shaker cor azul de 400ml';

        $this->tester->seeRecord(Produto::class, ['descricao' => $descricao_antigo]);
        $this->tester->dontSeeRecord(Produto::class, ['descricao' => $descricao_nova]);

        $produto = Produto::find()->where(['descricao' => $descricao_antigo])->one();
        $produto->descricao = $descricao_nova;
        $produto->save();

        $this->tester->seeRecord(Produto::class, ['descricao' => $descricao_nova]);

    }

    public function testAtualizarProdutoPreco()  // Verifica a alteração do campo Preco
    {

        $preco_antigo = 5;
        $preco_novo = 4;

        $this->tester->seeRecord(Produto::class, ['precoProduto' => $preco_antigo]);
        $this->tester->dontSeeRecord(Produto::class, ['precoProduto' => $preco_novo]);

        $produto = Produto::find()->where(['precoProduto' => $preco_antigo])->one();
        $produto->precoProduto = $preco_novo;
        $produto->save();

        $this->tester->seeRecord(Produto::class, ['precoProduto' => $preco_novo]);

    }


    public function testApagarProdutoNome() // Verifica se o produto foi apagado atravez do campo Nome
    {
        $this->tester->seeRecord(Produto::class, ['nome' => 'Shaker']);
        $produto = Produto::find()->where(['nome' => 'Shaker'])->one();
        $produto->delete();
        $this->tester->dontSeeRecord(Produto::class, ['nome' => 'Shaker']);
    }


    public function testApagarProdutoDescricao() // Verifica se o produto foi apagado atravez do campo Descricao
    {
        $this->tester->seeRecord(Produto::class, ['descricao' => 'shaker azul']);
        $produto = Produto::find()->where(['descricao' => 'shaker azul'])->one();
        $produto->delete();
        $this->tester->dontSeeRecord(Produto::class, ['descricao' => 'shaker azul']);
    }

    public function testApagarProdutoPreco() // Verifica se o produto foi apagado atravez do campo Preco
    {
        $this->tester->seeRecord(Produto::class, ['precoProduto' => 5]);
        $produto = Produto::find()->where(['precoProduto' => 5])->one();
        $produto->delete();
        $this->tester->dontSeeRecord(Produto::class, ['precoProduto' => 5]);
    }




}