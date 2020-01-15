<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ginasio}}`.
 */
class m200109_223120_create_ginasio_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ginasio}}', [
            'IDginasio' => $this->primaryKey(),
            'rua' => $this->string(255)->notNull(),
            'localidade' => $this->string(255)->notNull(),
            'cp' => $this->string(15)->notNull(),
            'telefone' => $this->string(15)->unique()->notNull(),
            'email' => $this->string(200)->unique()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ginasio}}');
    }
}
