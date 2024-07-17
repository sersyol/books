<?php

// views/site/books.php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $books app\models\Books[] */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-books">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <?php foreach ($books as $book): ?>
            <li><?= Html::encode($book->title) ?> by <?= Html::encode($book->author->name) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
