<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m170209_164641_create_event_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'show_id' => $this->integer()->unsigned()->notNull(),
            'area_id' => $this->integer()->unsigned()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-event-show_id',
            'event',
            'show_id',
            'show',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-event-area_id',
            'event',
            'area_id',
            'area',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('event');
    }
}
