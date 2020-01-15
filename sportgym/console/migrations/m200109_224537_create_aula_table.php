<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aula}}`.
 */
class m200109_224537_create_aula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aula}}', [
            'IDaula' => $this->primaryKey(),
            'tipo' => $this->string(100)->notNull(),
            'duracao' => $this->time()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%aula}}');
    }
}
