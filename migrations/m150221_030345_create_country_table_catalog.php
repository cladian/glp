<?php

use yii\db\Schema;
use yii\db\Migration;

class m150221_030345_create_country_table_catalog extends Migration
{
    public function up()
    {
    	$this->createTable('country', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING . '(45) NOT NULL',
            'description' => Schema::TYPE_TEXT ,
            'iso' => Schema::TYPE_STRING . '(3)',
            'color' => Schema::TYPE_STRING . '(45)',           
            'phone_code' => Schema::TYPE_STRING . '(45)',                     
            'status' => 'tinyint(2) DEFAULT 1',
            'rdate' => Schema::TYPE_TIMESTAMP ,
            'update' => Schema::TYPE_TIMESTAMP    

        ]);
    }

    public function down()
    {
    	$this->dropTable('country');
    }
}