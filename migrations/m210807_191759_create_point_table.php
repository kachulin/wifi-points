<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%point}}`.
 */
class m210807_191759_create_point_table extends Migration
{
    public function up()
    {
        $this->createTable('{{%point}}', [
            'pointId' => $this->primaryKey(),
            'macAddress' => $this->string(17)->notNull()->unique(),
            'languageId' => $this->integer(),
            'cityId' => $this->integer(),
        ]);

        // Создаем индекс на случай если выборка будет производится по полю languageId
        $this->createIndex(
            'idx-point-languageId',
            'point',
            'languageId'
        );
        
        // Прокидываем внешний ключ для связи со справочной таблицей language
        $this->addForeignKey(
            'fk-point-languageId',
            'point',
            'languageId',
            'language',
            'languageId',
            'CASCADE'
        );

        // Создаем индекс для оптимизации запросов с выборкой по городу
        $this->createIndex(
            'idx-point-cityId',
            'point',
            'cityId'
        );

        // Создаем внешний ключ для связи со справочной таблицей city
        $this->addForeignKey(
            'fk-point-cityId',
            'point',
            'cityId',
            'city',
            'cityId',
            'CASCADE'
        );

        $this->insert('point', ['macAddress' => '00-00-00-00-00-00', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '11-00-00-00-00-01', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '22-00-00-00-00-02', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '33-00-00-00-00-03', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '44-00-00-00-00-04', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '55-00-00-00-00-05', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '66-00-00-00-00-06', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '77-00-00-00-00-07', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '88-00-00-00-00-08', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '99-00-00-00-00-09', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => 'AA-00-00-00-00-0A', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => 'BB-00-00-00-00-0B', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => 'CC-00-00-00-00-0C', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => 'DD-00-00-00-00-0D', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => 'EE-00-00-00-00-0E', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => 'FF-00-00-00-00-0F', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '00-00-00-00-00-A0', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '11-00-00-00-00-A1', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '22-00-00-00-00-A2', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
        $this->insert('point', ['macAddress' => '33-00-00-00-00-A3', 'languageId' => rand(1,2), 'cityId' => rand(1,6)]);
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-point-cityId',
            'point'
        );

        $this->dropIndex(
            'idx-point-cityId',
            'point'
        );
        
        $this->dropForeignKey(
            'fk-point-languageId',
            'point'
        );

        $this->dropIndex(
            'idx-point-languageId',
            'point'
        );

        $this->dropTable('{{%point}}');
    }
}
