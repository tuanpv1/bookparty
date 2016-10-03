<?php

use yii\db\Migration;

/**
 * Handles adding x to table `order_book`.
 */
class m160919_120216_add_x_column_to_order_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('order_book', 'type', $this->integer(5));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('order_book', 'type');
    }
}
