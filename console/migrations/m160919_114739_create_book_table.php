<?php

use yii\db\Migration;

/**
 * Handles the creation for table `book`.
 */
class m160919_114739_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'name' => $this->string(),
            'address' => $this->string(),
            'time'=>$this->integer(),
            'status' => $this->integer(5),
            'note' => $this->string(),
            'phone' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'type' => $this->integer(5),
            'price' => $this->integer(),
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
