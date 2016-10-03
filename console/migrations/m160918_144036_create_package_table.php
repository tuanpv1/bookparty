<?php

use yii\db\Migration;

/**
 * Handles the creation for table `package`.
 */
class m160918_144036_create_package_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('package', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'image' => $this->string(),
            'price' => $this->integer(),
            'status' => $this->integer(5),
            'sale' => $this->integer(),
            'note' => $this->string(),
            'des' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('package');
    }
}
