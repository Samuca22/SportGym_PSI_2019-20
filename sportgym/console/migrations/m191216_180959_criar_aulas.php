<?php

use yii\db\Migration;

/**
 * Class m191216_180959_criar_aulas
 */
class m191216_180959_criar_aulas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('aula', [
            'tipo' => 'Cycling - Segunda-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Barriga Killer - Segunda-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Mega Calorie Burn - Segunda-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Spartans - Segunda-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Body Attack - Segunda-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'TRX - Terça-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Fat Burn - Terça-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Cross Moves - Quarta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Pilates - Quarta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'CrossFit - Quarta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Pump - Quinta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'PowerJump - Quinta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Hit - Quinta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Adaptive Box - Sexta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Combine Training - Sexta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Boot Camp - Sexta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Insanity - Sexta-Feira',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'X-Celerate - Sábado',
            'duracao' => '01:30',
        ]);

        $this->insert('aula', [
            'tipo' => 'Combat - Sábado',
            'duracao' => '01:30',
        ]);       
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191216_180959_criar_aulas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191216_180959_criar_aulas cannot be reverted.\n";

        return false;
    }
    */
}
