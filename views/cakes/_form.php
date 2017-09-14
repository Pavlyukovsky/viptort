<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cake */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cake-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
    <?php if (!$model->isNewRecord && $model->image !== ""): ?>
        <?= Html::a('Delete image', Yii::$app->urlManager->createUrl(['cakes/delete-image', 'id' => $model->id]), ['class' => 'btn btn-danger']); ?>
    <?php else: ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php endif; ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
