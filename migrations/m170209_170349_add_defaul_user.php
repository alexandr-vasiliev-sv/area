<?php

use yii\db\Migration;
use app\models\User;

class m170209_170349_add_defaul_user extends Migration
{
    public function up()
    {
        $defaultUser = new User();
        $defaultUser->username = 'admin';
        $defaultUser->email = 'test@gmail.com';
        $defaultUser->password_hash = Yii::$app->getSecurity()->generatePasswordHash('test123');
        $defaultUser->auth_key = \Yii::$app->security->generateRandomString();
        $defaultUser->save();
    }

    public function down()
    {
        User::deleteAll();
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
