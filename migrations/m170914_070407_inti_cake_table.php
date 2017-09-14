<?php

use yii\db\Migration;

class m170914_070407_inti_cake_table extends Migration
{
    const CAKES_TABLE_NAME = "{{%cakes}}";

    public function safeUp()
    {
        $this->createTable(self::CAKES_TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'views' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);

        return true;
    }

    public function safeDown()
    {
        $this->dropTable(self::CAKES_TABLE_NAME);

        return true;
    }

}
