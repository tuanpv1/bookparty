<?php

use yii\db\Migration;

/**
 * Handles the creation for table `sale`.
 */
class m160919_062456_create_sale_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('sale', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'des' => $this->text(),
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
        $this->dropTable('sale');
    }
}
