<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plano}}`.
 */
class m200109_224956_create_plano_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%plano}}', [
            'IDplano' => $this->primaryKey(),
            'nome' => $this->string(100)->notNull(),
            'tipo' => $this->boolean()->notNull(),
            'descricao' => $this->string(5000)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%plano}}');
    }
}
