<?php namespace backend\tests;

use common\models\Aula;

class AulasTest extends \Codeception\Test\Unit
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

    // tests
    public function getAulaValida()
    {

        $aula = new Aula();
        $aula->dtaInicio = '2019-12-25';
        $aula->tipo = "Cycling";
        $aula->duracao = '01:30:00';

        return $aula;
    }


    public function testAulaValida() //Verifica se a Aula é valida
    {
        $aula = $this->getAulaValida();
        $this->assertTrue($aula->validate());
    }


}