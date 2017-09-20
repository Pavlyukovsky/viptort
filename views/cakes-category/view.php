<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use app\models\CakesCategory;

/* @var $this yii\web\View */
/* @var $category CakesCategory */

$this->title = sprintf('Торты на заказ в Днепропетровске - категория - %s', $category->name);
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
