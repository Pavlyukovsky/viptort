<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Торты на заказ в Днепропетровске';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <?=
            ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '@app/views/cakes/_item.php',
                'layout'=>'{items}',
//                'summary' => false,
            ]);
            ?>
        </div>

        <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>

    </div>
</div>
