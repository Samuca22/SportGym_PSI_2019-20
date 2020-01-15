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

    }

    protected function _after()
    {
        
    }

    //INICIALIZAÇÃO  E VALIDAÇÃO
    public function testProdutoValido()
    {
        
        $produto = new Produto();
        $produto->nome = 'Batata Frita';
        $produto->descricao = 'Pacote de 3Kg de Batata Frita';
        $produto->precoProduto = 5;
        $produto->estado = 0;
        

        $this->assertTrue($produto->validate());
        return $produto;
    }

    //CAMPOS OBRIGATÓRIOS
    public function testNomeVazio()  // verifica se o campo Nome pode ser igual a Vazio
    {
        $produto = $this->testProdutoValido();
        $produto->nome = '';

        $this->assertFalse($produto->validate(['nome']));
    }

    public function testDescricaoVazia()  // verifica se o campo Descrição pode ser igual a Vazio
    {
        $produto = $this->testProdutoValido();
        $produto->descricao = '';

        $this->assertFalse($produto->validate(['descricao']));
    }

    public function testPrecoVazio()  // verifica se o campo precoProduto pode ser igual a Vazio
    {
        $produto = $this->testProdutoValido();
        $produto->precoProduto = '';

        $this->assertFalse($produto->validate(['precoProduto']));
    }


    //CAMPOS COM MÁXIMO DE CHARS
    public function testNomeDemasiadoLongo() // Verifica se o campo Nome pode conter a quantida de chars inseridos
    {
        $produto = $this->testProdutoValido();
        $produto->nome = "asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";

        $this->assertFalse($produto->validate(['nome']));
    }

    public function testDescricaoDemasidoLongo() // Verifica se o campo Descricao pode conter a quantida de chars inseridos
    {
        $produto = $this->testProdutoValido();
        $produto->descricao = "asssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";

        $this->assertFalse($produto->validate(['descricao']));
    }

    //CAMPOS QUE NÃO SUPORTAM STRINGS
    public function testEstadoAceitaString()  // verifica se o campo estado pode aceitar Strings
    {
        $produto = $this->testProdutoValido();
        $produto->estado = 'xxxxxxxxxxxxxxxxx';

        $this->assertFalse($produto->validate(['estado']));
    }

    public function testPrecoAceitaString()  // verifica se o campo precoProduto pode aceitar Strings
    {
        $produto = $this->testProdutoValido();
        $produto->precoProduto = 'xxxxxxxxxxxxxxxxxxxxxxx';

        $this->assertFalse($produto->validate(['precoProduto']));
    }

    public function testCriarProduto()  // verifica se o campo precoProduto pode aceitar Strings
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->descricao = 'Shaker azul';
        $produto->precoProduto = 123;

        $this->assertTrue($produto->validate() && $produto->save());
    }

    //VALIDAÇÃO SE O PRODUTO EXISTE
    public function testVerificarNomeExiste() // Test para verificar se o produto extiste
    {
        $this->tester->seeRecord(Produto::class, ['nome' => 'Shaker']);
    }


    //ATRIBUIÇÃO DE VALOR DEFAULT
    public function testEstadoDefault() // verifica se o campo Estado pode ser igual a Vazio
    {
        $produto = Produto::find()->where(['nome' => 'Shaker'])->one();
        $this->assertTrue($produto->estado == 0);
    }


    //ALTERAÇÃO DE CAMPOS
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
        $preco_antigo = 123;
        $preco_novo = 50;

        $this->tester->seeRecord(Produto::class, ['precoProduto' => $preco_antigo]);
        $this->tester->dontSeeRecord(Produto::class, ['precoProduto' => $preco_novo]);

        $produto = Produto::find()->where(['precoProduto' => $preco_antigo])->one();
        $produto->precoProduto = $preco_novo;
        $produto->save();

        $this->tester->seeRecord(Produto::class, ['precoProduto' => $preco_novo]);
    }


    //REMOÇÃO
    public function testApagarRegisto()  // Verifica a alteração do campo Preco
    {
        $produto = Produto::find()->where(['nome' => 'Shaker 400ml'])->one();
        $produto->delete();
    }



}