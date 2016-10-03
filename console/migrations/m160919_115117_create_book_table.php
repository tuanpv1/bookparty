<?php

use yii\db\Migration;

/**
 * Handles the creation for table `book`.
 */
class m160919_115117_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_book', [
            'id' => $this->primaryKey(),
            'id_book' => $this->integer(),
            'id_food' => $this->integer(),
            'id_package' => $this->integer(),
            'number' => $this->integer(),
            'price' => $this->integer(),
            'status' => $this->integer(5),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book');
    }
}
