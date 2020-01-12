<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%linhavenda}}`.
 */
class m200109_230716_create_linhavenda_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%linhavenda}}', [
            'IDlinhaVenda' => $this->primaryKey(),
            'quantidade' => $this->integer()->notNull(),
            'subTotal' => $this->integer()->notNull(),
            'IDvenda' => $this->integer()->notNull(),
            'IDproduto' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'id-linhavenda-IDvenda',
            'linhavenda',
            'IDvenda'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-post-linhavenda_id',
            'linhavenda',
            'IDvenda',
            'venda',
            'IDvenda',
            'CASCADE'
        );

        $this->createIndex(
            'id-linhavenda-IDproduto',
            'linhavenda',
            'IDproduto'
        );

        // adicionar foreign key para tabela `ginasio`
        $this->addForeignKey(
            'fk-linhavenda-produto_id',
            'linhavenda',
            'IDproduto',
            'produto',
            'IDproduto',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%linhavenda}}');
    }
}
