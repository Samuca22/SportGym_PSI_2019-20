<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%perfilaula}}`.
 */
class m200109_234916_create_perfilaula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perfilAula}}', [
            'IDperfil' => $this->integer()->notNull(),
            'IDaula' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('perfilaula_pks', 'perfilAula', ['IDperfil', 'IDaula']);

        $this->createIndex(
            'id-perfilAula-IDperfil',
            'perfilAula',
            'IDperfil'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-perfilAula-perfil_id',
            'perfilAula',
            'IDperfil',
            'perfil',
            'IDperfil',
            'CASCADE'
        );

        $this->createIndex(
            'id-perfilAula-IDaula',
            'perfilAula',
            'IDaula'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-perfilAula-aula_id',
            'perfilAula',
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
        $this->dropTable('{{%perfilaula}}');
    }
}
