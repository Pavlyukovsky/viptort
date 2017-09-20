<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CakesCategory */

$this->title = 'Создать категорию тортов';
$this->params['breadcrumbs'][] = ['label' => 'Категорит тортов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cakes-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
