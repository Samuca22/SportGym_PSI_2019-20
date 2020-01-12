<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ginasioAula}}`.
 */
class m200109_235305_create_ginasioAula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ginasioAula}}', [
            'IDginasio' => $this->integer()->notNull(),
            'IDaula' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('ginasioaula_pks', 'ginasioAula', ['IDginasio', 'IDaula']);

        $this->createIndex(
            'id-ginasioAula-IDginasio',
            'ginasioAula',
            'IDginasio'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-ginasiolAula-ginasio_id',
            'ginasioAula',
            'IDginasio',
            'ginasio',
            'IDginasio',
            'CASCADE'
        );

        $this->createIndex(
            'id-ginasioAula-IDaula',
            'ginasioAula',
            'IDaula'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-ginasioAula-aula_id',
            'ginasioAula',
            'IDaula',
            'aula',
            'IDaula',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ginasioAula}}');
    }
}
