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

        $perfil = new Perfil();
        $perfil->foto = 'foto.png';
        $perfil->primeiroNome ='Goncalo';
        $perfil->apelido = 'Oliveira';
        $perfil->genero ='M';
        $perfil->telefone = '916466780';
        $perfil->dtaNascimento = '1996-07-19';
        $perfil->rua = 'Rua Padre gens';
        $perfil->localidade = 'Ourem';
        $perfil->cp ='2490-300';
        $perfil->nif ='231234234';
        $perfil->peso ='70';

        $perfil->save();

    }

    protected function _after()
    {
    }

    // tests
    public function getPerfilValido()
    {

        $perfil = new Perfil();
        $perfil->foto = 'foto.png';
        $perfil->primeiroNome ='Goncalo';
        $perfil->apelido = 'Oliveira';
        $perfil->genero ='M';
        $perfil->telefone = '916466380';
        $perfil->dtaNascimento = '1996-07-19';
        $perfil->rua = 'Rua Padre gens';
        $perfil->localidade = 'Ourem';
        $perfil->cp ='2490-300';
        $perfil->nif ='231234234';
        $perfil->peso =70;
        $perfil->a =70;

        return $perfil;

    }

    public function testPerfilValido() //Verifica se o Perfil é valido
    {
        $perfil = $this->getPerfilValido();
        $this->assertTrue($perfil->validate());
    }

}