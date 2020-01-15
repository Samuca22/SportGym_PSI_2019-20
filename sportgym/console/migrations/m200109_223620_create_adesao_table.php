<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%adesao}}`.
 */
class m200109_223620_create_adesao_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%adesao}}', [
            'IDadesao' => $this->primaryKey(),
            'dtaInicio' => $this->date()->notNull(),
            'IDginasio' => $this->integer()->notNull(),
            'IDperfil' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'id-adesao-IDginasio',
            'adesao',
            'IDginasio'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-post-ginasio_id',
            'adesao',
            'IDginasio',
            'ginasio',
            'IDginasio',
            'CASCADE'
        );

        $this->createIndex(
            'id-adesao-IDperfil',
            'adesao',
            'IDperfil'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-post-perfil_id',
            'adesao',
            'IDperfil',
            'perfil',
            'IDperfil',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%adesao}}');
    }
}
