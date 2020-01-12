<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%venda}}`.
 */
class m200109_225318_create_venda_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%venda}}', [
            'IDvenda' => $this->primaryKey(),
            'estado' => $this->boolean()->notNull(),
            'dataVenda' => $this->date(),
            'total' => $this->float()->notNull(),
            'numVenda' => $this->string(20),
            'IDperfil' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'id-venda-IDperfil',
            'venda',
            'IDperfil'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-post-perfil_venda',
            'venda',
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
        $this->dropTable('{{%venda}}');
    }
}
