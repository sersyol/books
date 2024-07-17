<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Authors;
use kartik\select2\Select2;
/** @var yii\web\View $this */
/** @var app\models\Book $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'author_id')->textInput    () ?>

    <div class="row">
	<div class="col-md-4">
                    <?= $form->field($model,
                        'author_id')
                        ->widget(Select2::class, [
                            'data' => ArrayHelper::map(Authors::find()->all(), 'id', 'name'),
                            'options' => ['placeholder' => 'Выберите автора'],
                        ]) ?>
                </div>
	 </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
