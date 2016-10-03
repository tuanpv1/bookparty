<?php

use yii\db\Migration;

/**
 * Handles the creation for table `food`.
 */
class m160918_143716_create_food_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('food', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'name' => $this->string(),
            'des' => $this->text(),
            'price' => $this->integer(),
            'sale' => $this->integer(),
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
        $this->dropTable('food');
    }
}
