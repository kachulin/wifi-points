<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210807_123546_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string(32)->notNull(),
            'authKey' => $this->string()->notNull(),
            'accessToken' => $this->string()->unique(),
        ]);

        $this->insert('user', [
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'testAuthKey',
            'accessToken' => 'testAccessToken',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
