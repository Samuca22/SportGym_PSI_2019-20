<?php

use yii\db\Migration;

/**
 * Class m200110_003433_create_planos
 */
class m200110_003433_create_planos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('plano', [
            'IDplano' => 2,
            'nome' => 'Sportgym_Treino - Musculação',
            'descricao' => 'Musculação - Ganhar 23kg

            SEGUNDA-FEIRA (Peito e Bícep)
            Aquecer 5min
            Supino x4 8-10reps
            ...

            TERCA-FEIRA (Pernas)
            Aquecer 5min
            Agachamentos x4 8-10reps
            ...
            
            QUARTA-FEIRA (Costas e Trícep)
            Aquecer 5min
            Elevações x4 8-10reps
            ...',
            'tipo' => 0,
        ]);


        $this->insert('plano', [
            'IDplano' => 1,
            'nome' => 'Sportgym_Nutrição - Tonificar',
            'descricao' => 'Tonificar - Ficar Tonificado

            PEQUENO-ALMOÇO
            leite com aveia OU ovos com batatas
        
            LANCHE DA MANHÃ
            Pão com atum
    
            ALMOÇO
            Batata doce com arroz com um peito de frango
        
            LANCHA DA TARDE
            Pão com cebola e maionese
        
            JANTAR
            Batata salgada com massa e salmão
        
            CEIA
            Shake',
            'tipo' => 1,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200110_003433_create_planos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_003433_create_planos cannot be reverted.\n";

        return false;
    }
    */
}
