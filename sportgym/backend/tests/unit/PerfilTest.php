<?php namespace backend\tests;

use common\models\Perfil;

class PerfilTest extends \Codeception\Test\Unit
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
    public function GetPerfilValido()
    {
        $perfil = new Perfil();
        
        $perfil->primeiroNome="Samuel";
        $perfil->apelido="Martins";
        $perfil->genero="M";
        $perfil->telefone="919191919";
        $perfil->dtaNascimento="1999-02-22";
        $perfil->rua="Rua de Caxarias";
        $perfil->localidade="Caxarias";
        $perfil->cp="2435-010";
        $perfil->nif="253654789";
        //$perfil->peso=70;
        //$perfil->altura=170;
        $perfil->estatuto="1";
        $perfil->foto="prof.png";
        
        return $perfil;
    }

    public function testGetPerfilValido()
    {
        $perfil = $this->GetPerfilValido();
        
        $this->assertTrue($perfil->validate());
    }
}