<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m240715_164511_create_authors_table extends Migration
{
 // create_authors_table.php
public function safeUp()
{
    $this->createTable('{{%authors}}', [
        'id' => $this->primaryKey(),
        'name' => $this->string(255)->notNull(),
    ]);
}

// create_books_table.php


}
