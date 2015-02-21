<?php

use yii\db\Schema;
use yii\db\Migration;

class m150221_042510_create_event_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('event', [
        'id' => 'pk',
        'name' => Schema::TYPE_STRING . '(45) NOT NULL',
        'description' => Schema::TYPE_TEXT ,
        'country_id' => Schema::TYPE_INTEGER . ' NOT NULL' ,
        'eventtype_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
        'rdate' => Schema::TYPE_TIMESTAMP ,
        'update' => Schema::TYPE_TIMESTAMP

        ]);
        $this->createTable('eventtype', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING . '(45) NOT NULL',
            'description' => Schema::TYPE_TEXT ,
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'rdate' => Schema::TYPE_TIMESTAMP ,
            'update' => Schema::TYPE_TIMESTAMP

        ]);
        $this->addForeignKey('FK_1', 'event', 'eventtype_id', 'eventtype', 'id', 'CASCADE', 'NO ACTION');

        $this->createTable('country', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING . '(45) NOT NULL',
            'description' => Schema::TYPE_TEXT ,
            'iso' => Schema::TYPE_STRING . '(3)',
            'color' => Schema::TYPE_STRING . '(45)',
            'phone_code' => Schema::TYPE_STRING . '(45)',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'rdate' => Schema::TYPE_TIMESTAMP ,
            'update' => Schema::TYPE_TIMESTAMP

        ]);
        $this->addForeignKey('FK_2', 'event', 'country_id', 'country', 'id', 'CASCADE', 'NO ACTION');
         }

        public function down()
        {
            $this->dropTable('event');
            $this->dropTable('eventtype');
            $this->dropTable('country');
        }

}
