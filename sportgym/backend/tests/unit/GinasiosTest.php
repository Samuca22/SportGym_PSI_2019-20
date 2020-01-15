<?php namespace backend\tests;

use common\models\Ginasio;

class GinasiosTest extends \Codeception\Test\Unit
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

    //CRIA UM GINÁSIO VÁLIDO
    public function testGinasioValido() //Verifica se o Ginasio é valido
    {
        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua de Faro';
        $ginasio->localidade = 'Faro';
        $ginasio->cp = '2490-235';
        $ginasio->telefone = '218032564';
        $ginasio->email = 'faro@sportgym.pt';

        $this->assertTrue($ginasio->validate());
        return $ginasio;
    }


    //CAMPOS OBRIGATÓRIOS
    //VERIFICA SE O CAMPO RUA PODE SER VAZIO
    public function testRuaVazio() // verifica se o campo Rua pode ser igual a Vazio
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->rua = '';

        $this->assertFalse($ginasio->validate(['rua']));
    }

    //VERIFICA SE O CAMPO TELEFONE PODE SER VAZIO
    public function testLocalidadeVazio() // verifica se o campo Localidade pode ser igual a Vazio
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->localidade = '';

        $this->assertFalse($ginasio->validate(['localidade']));
    }

    //VERIFICA SE O CAMPO CP PODE SER VAZIO
    public function testCpVazio() // verifica se o campo cp pode ser igual a Vazio
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->cp = '';

        $this->assertFalse($ginasio->validate(['cp']));
    }

    //VERIFICA SE O CAMPO TELEFONE PODE SER VAZIO
    public function testTelefoneVazio() // verifica se o campo Telefone pode ser igual a Vazio
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->telefone = '';

        $this->assertFalse($ginasio->validate(['telefone']));
    }

    //VERIFICA SE O CAMPPO EMAIL PODE SER VAZIO
    public function testEmailVazio() 
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->email = '';

        $this->assertFalse($ginasio->validate(['email']));
    }


    //CAMPOS COM MÁXIMO DE CHARS
    //VERIFICA O COMPRIMENTO DO CAMPO RUA
    public function testRuaDemasiadoLongo() // Verifica se o campo rua pode conter a quantida de chars inseridos
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->rua = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";

        $this->assertFalse($ginasio->validate(['rua']));
    }

    //VERIFICA O COMPRIMENTO DO CAMPO LOCALIDADE
    public function testLocalidadeDemasiadoLongo() // Verifica se o campo Localidade pode conter a quantida de chars inseridos
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->localidade = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss";

        $this->assertFalse($ginasio->validate(['localidade']));
    }

    //VERIFICA O COMPRIMENTO DO CAMPO EMAIL
    public function testEmailDemasiadoLongo() // Verifica se o campo Email pode conter a quantida de chars inseridos
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->email = "assssssssdddddddddddddddddddddddddddddddddddddddddddaaaaaaaaaaaaaaaaaaaaaaaaaassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss@sapo.pt";

        $this->assertFalse($ginasio->validate(['email']));
    }

    //VERIFICA O COMPRIMENTO DO CAMPO CP
    public function testCpDemasiadoLongo() // Verifica se o campo Cp pode conter a quantida de chars inseridos
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->cp = "XXXXXXXXXXXXXXXXX";

        $this->assertFalse($ginasio->validate(['cp']));
    }

    //VERIFICA O COMPRIMENTO DO CAMPO TELEFONE
    public function testTelefoneDemasiadoLongo() // Verifica se o campo Telefone pode conter a quantida de chars inseridos
    {
        $ginasio = $this->testGinasioValido();
        $ginasio->telefone = "93939393939393";

        $this->assertFalse($ginasio->validate(['telefone']));
    }

    //CAMPOS ÚNICOS
    //VERIFICA SE O CAMPO TELEFONE PODE SER REPETIDO
    public function testTelefoneRepetido() // Verifica se o campo telefone pode ser repetido
    {
        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua da Dr Sa Carneiro';
        $ginasio->localidade = 'Braga';
        $ginasio->cp = '2465-232';
        $ginasio->telefone = '212356789';
        $ginasio->email = 'braga@sportgym.pt';

        $this->assertFalse($ginasio->validate(['telefone']));
    }

    //VERIFICA SE O CAMPO EMAIL PODE SER REPETIDO
    public function testEmailRepetido() // Verifica se o campo email pode ser repetido
    {
        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua da Dr Sa Carneiro';
        $ginasio->localidade = 'Braga';
        $ginasio->cp = '2465-232';
        $ginasio->telefone = '234343433';
        $ginasio->email = 'ourem@sportgym.pt';

        $this->assertFalse($ginasio->validate(['email']));
    }


    //VERIFICA SE O CAMPO 'email' É VÁLIDO (DO TIPO EMAIL)
    public function testEmailValidacao() 
    {
        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua da Dr Sa Carneiro';
        $ginasio->localidade = 'Brsga';
        $ginasio->cp = '2465-232';
        $ginasio->telefone = '244323423';
        $ginasio->email = 'braga';

        $this->assertFalse($ginasio->validate(['email']));
    }

    //CRIA UM NOVO GINÁSIO E GUARDA NA BASE DE DADOS
    public function testCriarGinasio() //Verifica se o Ginasio é valido
    {
        $ginasio = new Ginasio();
        $ginasio->rua = 'Rua de Faro';
        $ginasio->localidade = 'Faro';
        $ginasio->cp = '2465-235';
        $ginasio->telefone = '218032564';
        $ginasio->email = 'faro@sportgym.pt';

        $this->assertTrue($ginasio->validate() && $ginasio->save());
    }

    //VERIFICA SE O GINÁSIO CRIADO EXISTE NA BASE DE DADOS
    public function testVerificarGinasioExiste() // Test para verificar se o Ginasio extiste
    {
        $this->tester->SeeRecord(Ginasio::class, ['localidade' => 'Faro']);
    }


    //ALTERAÇÃO DE CAMPOS
    //ATUALIZA O CAMPO EMAIL DO GINÁSIO
    public function testAtualizarGinasioEmail()  // Verifica a alteração do campo Email
    {
        $email_antigo = 'faro@sportgym.pt';
        $email_novo = 'vilareal@sportgym.pt';

        $this->tester->seeRecord(Ginasio::class, ['email' => $email_antigo]);
        $this->tester->dontSeeRecord(Ginasio::class, ['email' => $email_novo]);

        $ginasio = Ginasio::find()->where(['email' => $email_antigo])->one();
        $ginasio->email = $email_novo;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['email' => $email_novo]);
        $ginasio->email = $email_antigo;
        $ginasio->save();
    }

    //ATUALIZA O CAMPO TELEFONE DO GINÁSIO
    public function testAtualizarGinasioTelefone()  // Verifica a alteração do campo Telefone
    {
        $telefone_antigo = '218032564';
        $telefone_novo = '243323423';

        $this->tester->seeRecord(Ginasio::class, ['telefone' => $telefone_antigo]);
        $this->tester->dontSeeRecord(Ginasio::class, ['telefone' => $telefone_novo]);

        $ginasio = Ginasio::find()->where(['telefone' => $telefone_antigo])->one();
        $ginasio->telefone = $telefone_novo;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['telefone' => $telefone_novo]);
        $ginasio->telefone = $telefone_antigo;
        $ginasio->save();
    }


    //ATUALIZA O CAMPO RUA DO GINÁSIO
    public function testAtualizarGinasioRua()  // Verifica a alteração do campo Rua
    {
        $rua_antiga = 'Rua de Faro';
        $rua_nova = 'Rua de Sto. Antonio';

        $this->tester->seeRecord(Ginasio::class, ['rua' => $rua_antiga]);
        $this->tester->dontSeeRecord(Ginasio::class, ['rua' => $rua_nova]);

        $ginasio = Ginasio::find()->where(['rua' => $rua_antiga])->one();
        $ginasio->rua = $rua_nova;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['rua' => $rua_nova]);
        $ginasio->rua = $rua_antiga;
        $ginasio->save();
    }

    //ATUALIZA O CAMPO CP DO GINÁSIO
    public function testAtualizarGinasioLocalidade()  // Verifica a alteração do campo localidade
    {
        $localidade_antiga = 'Faro';
        $localidade_nova = 'Vila Real';

        $this->tester->seeRecord(Ginasio::class, ['localidade' => $localidade_antiga]);
        $this->tester->dontSeeRecord(Ginasio::class, ['localidade' => $localidade_nova]);

        $ginasio = Ginasio::find()->where(['localidade' => $localidade_antiga])->one();
        $ginasio->localidade = $localidade_nova;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['localidade' => $localidade_nova]);
        $ginasio->localidade = $localidade_antiga;
        $ginasio->save();
    }

    //ATUALIZA O CAMPO CP DO GINÁSIO
    public function testAtualizarGinasioCp()  // Verifica a alteração do campo Cp
    {
        $cp_antigo = '2465-235';
        $cp_novo = '2790-400';

        $this->tester->seeRecord(Ginasio::class, ['cp' => $cp_antigo]);
        $this->tester->dontSeeRecord(Ginasio::class, ['cp' => $cp_novo]);

        $ginasio = Ginasio::find()->where(['cp' => $cp_antigo])->one();
        $ginasio->cp = $cp_novo;
        $ginasio->save();

        $this->tester->seeRecord(Ginasio::class, ['cp' => $cp_novo]);
        $ginasio->cp = $cp_antigo;
        $ginasio->save();
    }


    //TESTA A REMOÇÃO DE UM GINÁSIO
    public function testApagarGinasio() 
    {
        $this->tester->seeRecord(Ginasio::class, ['localidade' => 'Faro']);
        $ginasio = Ginasio::find()->where(['localidade' => 'Faro'])->one();
        $ginasio->delete();
        $this->tester->dontSeeRecord(Ginasio::class, ['localidade' => 'Faro']);
    }
}