<?php namespace backend\tests;

use common\models\LeituraSensores;

class LeituraSensoresTest extends \Codeception\Test\Unit
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

    public function testLeituraSensoresValido()
    {
        $sensores = new LeituraSensores();
        $sensores->temperatura = 22.5;
        $sensores->humidade = 60;
        $sensores->luminosidade = 50.7;
        $sensores->descricao = 'leitura de sensores numa sala de aula';
        
        $this->assertTrue($sensores->validate() && $sensores->save());

        $this->tester->seeRecord(LeituraSensores::class, ['temperatura' => 22.5]);
    }

    public function testApagarLeituraSensores()
    {
        $sensores = LeituraSensores::find()->where(['temperatura' => 22.5])->one();
        $sensores->delete();
    }



    public function testLeituraSensoresSemTemperatura()
    {
        $sensores = new LeituraSensores();
        $sensores->temperatura = null;
        $sensores->humidade = 50;
        $sensores->luminosidade = 40.7;
        $sensores->descricao = 'leitura de sensores numa sala de aula';
        
        $this->assertFalse($sensores->validate() && $sensores->save());

        $this->tester->dontSeeRecord(LeituraSensores::class, ['humidade' => 50]);
    }

    public function testLeituraSensoresSemHumidade()
    {
        $sensores = new LeituraSensores();
        $sensores->temperatura = 18.5;
        $sensores->humidade = null;
        $sensores->luminosidade = 30.7;
        $sensores->descricao = 'leitura de sensores numa sala de aula';
        
        $this->assertFalse($sensores->validate() && $sensores->save());

        $this->tester->dontSeeRecord(LeituraSensores::class, ['temperatura' => 18.5]);
    }

    public function testLeituraSensoresSemLuminosidade()
    {
        $sensores = new LeituraSensores();
        $sensores->temperatura = 8.5;
        $sensores->humidade = 40;
        $sensores->luminosidade = null;
        $sensores->descricao = 'leitura de sensores numa sala de aula';
        
        $this->assertFalse($sensores->validate() && $sensores->save());

        $this->tester->dontSeeRecord(LeituraSensores::class, ['temperatura' => 8.5]);
    }


    public function testLeituraSensoresSemDescricao()
    {
        $sensores = new LeituraSensores();
        $sensores->temperatura = 38.5;
        $sensores->humidade = 30;
        $sensores->luminosidade = 20.7;
        $sensores->descricao = '';
        
        $this->assertFalse($sensores->validate() && $sensores->save());

        $this->tester->dontSeeRecord(LeituraSensores::class, ['temperatura' => 38.5]);
    }




}