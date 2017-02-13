<?php

use yii\db\Migration;

/**
 * Handles the creation of table `show`.
 */
class m170209_164530_create_show_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('show', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->unique()->notNull(),
            'image' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('show');
    }
}
