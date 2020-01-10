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
        $produto->estado = 0;

        $produto->save();

    }

    protected function _after()
    {
    }

    //INICIALIZAÇÃO  E VALIDAÇÃO
    public function getProdutoValido()
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = 'shake azul';
        $produto->precoProduto = 5;
        $produto->estado = 0;

        return $produto;
    }

    public function testProdutoValido() //Verifica se o Produto é valido
    {
        $produto = $this->getProdutoValido();
        $this->assertTrue($produto->validate());
    }


    //CAMPOS OBRIGATÓRIOS
    public function testNomeVazio()  // verifica se o campo Nome pode ser igual a Vazio
    {
        $produto = new Produto();
        $produto->nome = null;
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }

    public function testPrecoVazio()  // verifica se o campo precoProduto pode ser igual a Vazio
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = 'shaker azul';
        $produto->precoProduto = 'null';
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }

    public function testDescricaoVazia()  // verifica se o campo Descrição pode ser igual a Vazio
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = null;
        $produto->precoProduto = 5;
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }

    public function testFotovazia()  // verifica se o campo fotoProduto pode ser igual a Vazio
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = null;
        $produto->descricao = 'shaker azul';
        $produto->precoProduto = 5;
        $produto->estado = 0;

        $this->assertTrue($produto->validate(['fotoProduto']));
    }


    //CAMPOS COM MÁXIMO DE CHARS
    public function testNomeDemasiadoLongo() // Verifica se o campo Nome pode conter a quantida de chars inseridos
    {
        $produto = new Produto();
        $produto->nome = "asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }

    public function testDescricaoDemasidoLongo() // Verifica se o campo Descricao pode conter a quantida de chars inseridos
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "asssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $produto->precoProduto = 5;
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }

    public function testFotoDemasiadoLongo() // Verifica se o campo  fotoProduto conter a quantida de chars inseridos
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = "asssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";
        $produto->descricao = 'shaker azul';
        $produto->precoProduto = 5;
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }


    //CAMPOS QUE NÃO SUPORTAM STRINGS
    public function testEstadoAceitaString()  // verifica se o campo estado pode aceitar Strings
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = 'shaker azul';
        $produto->precoProduto = 5;
        $produto->estado = 'estado';

        $this->assertFalse($produto->validate());
    }

    public function testPrecoAceitaString()  // verifica se o campo precoProduto pode aceitar Strings
    {
        $produto = new Produto();
        $produto->nome = 'Shaker';
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = 'shaker azul';
        $produto->precoProduto = 'Dinheiro';
        $produto->estado = 0;

        $this->assertFalse($produto->validate());
    }


    //ATRIBUIÇÃO DE VALOR DEFAULT
    public function testEstadoDefault() // verifica se o campo Estado pode ser igual a Vazio
    {
        $produto = new Produto();
        $produto->nome = "Shaker";
        $produto->fotoProduto = 'teste.png';
        $produto->descricao = "shake azul";
        $produto->precoProduto = 5;

        $this->assertTrue($produto->validate() && $produto->estado == 0);
    }


    //VALIDAÇÃO SE O PRODUTO EXISTE
    public function testVerificarNomeExiste() // Test para verificar se o produto extiste
    {
        $this->tester->seeRecord(Produto::class, ['nome' => 'Shaker']);
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
        $preco_antigo = 5;
        $preco_novo = 4;

        $this->tester->seeRecord(Produto::class, ['precoProduto' => $preco_antigo]);
        $this->tester->dontSeeRecord(Produto::class, ['precoProduto' => $preco_novo]);

        $produto = Produto::find()->where(['precoProduto' => $preco_antigo])->one();
        $produto->precoProduto = $preco_novo;
        $produto->save();

        $this->tester->seeRecord(Produto::class, ['precoProduto' => $preco_novo]);
    }


    //REMOÇÃO DE CAMPOS
    public function testApagarProdutoNome() // Verifica se o produto foi apagado atraves do campo Nome
    {
        $this->tester->seeRecord(Produto::class, ['nome' => 'Shaker']);
        $produto = Produto::find()->where(['nome' => 'Shaker'])->one();
        $produto->delete();
        $this->tester->dontSeeRecord(Produto::class, ['nome' => 'Shaker']);
    }

    public function testApagarProdutoDescricao() // Verifica se o produto foi apagado atraves do campo Descricao
    {
        $this->tester->seeRecord(Produto::class, ['descricao' => 'shaker azul']);
        $produto = Produto::find()->where(['descricao' => 'shaker azul'])->one();
        $produto->delete();
        $this->tester->dontSeeRecord(Produto::class, ['descricao' => 'shaker azul']);
    }

}