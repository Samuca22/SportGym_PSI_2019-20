<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%perfilPlano}}`.
 */
class m200109_231527_create_perfilPlano_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perfilPlano}}', [
            'IDperfil' => $this->integer()->notNull(),
            'IDplano' => $this->integer()->notNull(),
            'dtaplano' => $this->date()->notNull(),

        ]);

        $this->addPrimaryKey('perfilplano_pks', 'perfilPlano', ['IDperfil', 'IDplano']);

        $this->createIndex(
            'id-perfilPlano-IDperfil',
            'perfilPlano',
            'IDperfil'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-perfilPlano-perfil_id',
            'perfilPlano',
            'IDperfil',
            'perfil',
            'IDperfil',
            'CASCADE'
        );

        $this->createIndex(
            'id-perfilPlano-IDplano',
            'perfilPlano',
            'IDplano'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-perfilPlano-plano_id',
            'perfilPlano',
            'IDplano',
            'plano',
            'IDplano',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%perfilPlano}}');
    }
}
