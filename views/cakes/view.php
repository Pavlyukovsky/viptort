<?php
use app\models\Cake;

/* @var $this yii\web\View */
/* @var $model Cake */

$this->title = sprintf('Торт "%s". Торты на заказ в Днепропетровске', $model->name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cake-index">
    <div class="row">
        <div class="col-sm-12">
            <div class="view-cake">
                <img src="/<?= $model->getImageUrl() ?>" alt="<?= $model->name ?>">
            </div>
        </div>
        <div class="col-sm-12 view-cake-description">
            <span class="title">Описание: </span> <?= $model->description; ?>
        </div>
    </div>
</div>
