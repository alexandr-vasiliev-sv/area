<?php

use yii\db\Migration;

class m170212_173318_add_column_to_event_table extends Migration
{
    public function up()
    {
        $this->addColumn('event', 'image', $this->string()->notNull());
        $this->addColumn('event', 'title', $this->string()->notNull());
        $this->addColumn('event', 'description', $this->text()->notNull());
    }

    public function down()
    {
        $this->dropColumn('event', 'image');
        $this->dropColumn('event', 'title');
        $this->dropColumn('event', 'description');
    }

}
