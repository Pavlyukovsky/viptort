<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\components\CategoriesList;
use app\models\CakesCategory;

/** @var $models CakesCategory[] */
/** @var $self CategoriesList */
?>
<div id="" class="sidebar-category ">
    <div class="category-title" style="margin-bottom: 10px;">

        <span class="panel-title h4"><?= Yii::t('app', 'Категоии тортов') ?></span>

    </div>

    <div class="category-content">

        <div class="list-group">
            <a href="<?= Url::to('/') ?>"
               class="list-group-item <?= $self->isMainPage() ? 'active' : '' ?>">
                <?= Yii::t('app', 'Все') ?>
                <span class="pull-right">( <?= $self->getCountAllItems() ?> )</span>
            </a>

            <?php foreach ($models as $model): ?>
                <a href="<?= Yii::$app->urlManager->createUrl(['/cakes-category/view', 'alias' => $model->alias]) ?>"
                   class="list-group-item <?= $self->isActiveModel($model) ? 'active' : '' ?>">
                    <?= Html::encode($model->name) ?>
                    <span class="pull-right">( <?= count($model->cakes) ?> )</span>
                </a>
            <?php endforeach; ?>
            <div class="clear"></div>
        </div>

    </div>
</div>