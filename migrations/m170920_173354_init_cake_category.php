<?php

use yii\db\Migration;

class m170920_173354_init_cake_category extends Migration
{
    const CAKES_CATEGORY_TABLE_NAME = "{{%cakes_category}}";
    const CAKES_TABLE_NAME = "{{%cakes}}";

    public function up()
    {
        $this->truncateTable(self::CAKES_TABLE_NAME);

        $this->createTable(self::CAKES_CATEGORY_TABLE_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'alias' => $this->string()->notNull()->unique(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);

        $this->addColumn(self::CAKES_TABLE_NAME, 'category_id', $this->integer()->notNull()->after('id'));

        $this->addForeignKey('cakes_to_cakes_category', self::CAKES_TABLE_NAME, 'category_id', self::CAKES_CATEGORY_TABLE_NAME, 'id', 'CASCADE', 'CASCADE');

        return true;
    }

    public function down()
    {
        $this->dropForeignKey('cakes_to_cakes_category', self::CAKES_TABLE_NAME);

        $this->dropColumn(self::CAKES_TABLE_NAME, 'category_id');

        $this->dropTable(self::CAKES_CATEGORY_TABLE_NAME);

        return true;
    }
}
