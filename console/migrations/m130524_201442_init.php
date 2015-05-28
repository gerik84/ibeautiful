<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        $this->execute($this->addUserSql());
    }
    private function addUserSql()
    {
        $password = Yii::$app->security->generatePasswordHash('admin');
        $auth_key = Yii::$app->security->generateRandomString();
        $token = Yii::$app->security->generateRandomString() . '_' . time();
        $time = time();
        //echo "INSERT INTO {{%user}} ('username', 'email', 'password_hash', 'auth_key', 'token', 'status'', 'created_at', 'updated_at) VALUES ('admin', 'admin@myblog.loc', '$password', '$auth_key', '$token', 10, ".time().", ".time().")";
        return "INSERT INTO {{%user}} (`username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at` )
VALUES ('admin', '$auth_key', '$password', '', '', '10', '$time', '$time')";
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
