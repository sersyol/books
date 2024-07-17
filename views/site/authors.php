<?php

// views/site/authors.php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $authors app\models\Authors[] */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-authors">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($authors as $author): ?>
        <h2><?= Html::encode($author->name) ?></h2>
        <ul>
            <?php foreach ($author->books as $book): ?>
                <li><?= Html::encode($book->title) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>
