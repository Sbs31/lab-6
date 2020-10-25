<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m201025_163155_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'status' => $this->boolean(),
            'category_id' => $this->integer()->defaultValue(1),
            'count' => $this->integer(11),
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('products');
    }
}

