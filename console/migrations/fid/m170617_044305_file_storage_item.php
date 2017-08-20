<?php

use yii\db\Schema;
use  console\migrations\fid\components\Migration;

class m170617_044305_file_storage_item extends Migration
{
    public function up()
    {
        $this->createTable('{{%file_storage_item}}', [
            'id' => $this->primaryKey(),
            'component' => $this->string()->notNull(),
            'base_url' => $this->string(1024)->notNull(),
            'path' => $this->string(1024)->notNull(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'upload_ip' => $this->string(15),
            'created_at' => $this->integer()->notNull()
        ]);

        $this->createTable('{{%notify_attachments}}', [
            'id' => $this->primaryKey(),
            'ref_id' => $this->bigInteger()->notNull(),
            'code' => $this->string(10)->notNull(),
            'desc' => $this->text()->notNull(),
            'comment' => $this->string()->notNull(),
            'path' => $this->string()->notNull(),
            'base_url' => $this->string(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'created_at' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%file_storage_item}}');
    }

}
