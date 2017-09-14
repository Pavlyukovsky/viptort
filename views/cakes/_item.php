<?php
use app\models\Cake;

/**@var $model Cake */
?>
<div class="col-xs-6 col-md-3 col-lg-2 cake" style="margin-top: 20px">
    <a href="<?= Yii::$app->urlManager->createUrl(['cakes/view', 'id' => $model->id]); ?>" class="item"
       style="display: block">
        <div class="title"><?= $model->name; ?></div>
        <div class="cake-img" style="background-image: url('/<?= $model->getImageUrl() ?>');">
        </div>
        <div class="views"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?= $model->views; ?>
        </div>
    </a>
</div>