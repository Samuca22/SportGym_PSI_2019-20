<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%perfil}}`.
 */
class m200109_220952_create_perfil_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%perfil}}', [
            'IDperfil' => $this->primaryKey(),
            'nSocio' => $this->integer()->unsigned()->unique()->notNull(),
            'foto' => 'LONGBLOB',
            'primeiroNome' => $this->string(50)->notNull(),
            'apelido' => $this->string(30)->notNull(),
            'genero' => 'ENUM("M", "F") NOT NULL',
            'telefone' => $this->string(15)->unique()->notNull(),
            'dtaNascimento' => $this->date()->notNull(),
            'rua' => $this->string(500)->notNull(),
            'localidade' => $this->string(255)->notNull(),
            'cp' => $this->string(15)->notNull(),
            'nif' => $this->string(15)->unique()->notNull(),
            'peso' => $this->double()->notNull()->defaultValue(0),
            'altura' => $this->integer()->notNull()->defaultValue(0),
        ]);

        $this->addForeignKey(
            'fk-user-perfil_id',
            'perfil',
            'IDperfil',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%perfil}}');
    }
}
