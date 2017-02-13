<?php

use yii\db\Migration;

/**
 * Handles the creation of table `area`.
 */
class m170209_164300_create_area_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('area', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull()->unique(),
            'image' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'order' => $this->integer()->unique()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('area');
    }
}
