<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CakesCategory */

$this->title = 'Изменить категорию тортов: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории тортов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="cakes-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
