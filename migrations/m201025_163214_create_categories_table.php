<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m201025_163214_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'description' => $this->text(),
            'created_at' => $this->Datetime(),
            'updated_at' => $this->Datetime(),
            'created_by' => $this->Boolean(),
        ]);
    }
    public function down()
    {
        $this->dropTable('categories');
    }
    /**
     * {@inheritdoc}
     */

}
