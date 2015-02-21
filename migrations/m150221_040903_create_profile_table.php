<?php

use yii\db\Schema;
use yii\db\Migration;

class m150221_040903_create_profile_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        # PERFIL
        $this->createTable('{{%profile}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'lastname'=>Schema::TYPE_STRING.' NOT NULL',
            'institution_name'=>Schema::TYPE_STRING,
            'responsibility_name'=>Schema::TYPE_STRING,
            'gender'=>'ENUM(\'M\', \'F\')',
            'phone_number'=>Schema::TYPE_STRING.'(15)',
            'phone_mobile'=>Schema::TYPE_STRING.'(15)',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'rdate' => Schema::TYPE_TIMESTAMP ,
            'update' => Schema::TYPE_TIMESTAMP,
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL'  # variable que recibe la relación desde el Cátalogo
        ], $tableOptions);

        #USUARIO
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' =>Schema::TYPE_TIMESTAMP,
            'updated_at' => Schema::TYPE_TIMESTAMP

        ], $tableOptions);

        #Relación
        $this->addForeignKey('FK_user', 'profile', 'user_id', 'user', 'id', 'CASCADE', 'NO ACTION');


        ## Agregar Registros
        $this->insert('user', array(
            "id" => 1,
            "username" => "admin",
            "email" => "edison@cladian.com",
            "auth_key" => Yii::$app->security->generateRandomString(),
            "password_hash" => Yii::$app->security->generatePasswordHash('1234567890'),
            "created_at"=>date('Y-m-d H:i:s'),
            "updated_at"=>date('Y-m-d H:i:s'),
        ));
    }

    public function down()
    {
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%user}}');
    }
}
