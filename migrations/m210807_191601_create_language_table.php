<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m210807_191601_create_language_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%language}}', [
            'languageId' => $this->primaryKey(),
            'name' => $this->string()->notNull(2)->unique(),
        ]);

        $this->insert('language', ['name' => 'ru']);
        $this->insert('language', ['name' => 'en']);
    }

    public function down()
    {
        $this->dropTable('{{%language}}');
    }
}
