<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city}}`.
 */
class m210807_191701_create_city_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%city}}', [
            'cityId' => $this->primaryKey(),
            'name' => $this->string(32)->notNull()->unique(),
        ]);

        $this->insert('city', ['name' => 'Пермь']);
        $this->insert('city', ['name' => 'Москва']);
        $this->insert('city', ['name' => 'Минск']);
        $this->insert('city', ['name' => 'Нью-йорк']);
        $this->insert('city', ['name' => 'Сан-Франциско']);
        $this->insert('city', ['name' => 'Лондон']);
    }

    public function down()
    {
        $this->dropTable('{{%city}}');
    }
}
