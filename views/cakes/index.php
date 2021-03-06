<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Cake;
use app\models\CakesCategory;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CakeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Торты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cake-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать торт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'format'    => 'raw',
            ],
            [
                'label' => 'Категория (id)',
                'attribute' => 'category_id',
                'format'    => 'raw',
                'value'     => function (Cake $model){
                    if(isset($model->cakesCategory)){
                        return sprintf('%s (id: %s)', $model->cakesCategory->name, $model->id);
                    }
                    return null;
                }
            ],
            [
                'attribute' => 'image',
                'format'    => 'raw',
            ],
            [
                'attribute' => 'description',
                'format'    => 'raw',
            ],
            [
                'attribute' => 'views',
                'format'    => 'raw',
            ],
            [
                'attribute' => 'created_at',
                'format'    => 'raw',
            ],
            [
                'attribute' => 'updated_at',
                'format'    => 'raw',
            ],

            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons'  => [
                    'update' => function ($url, Cake $model) {
                        $options = [
                            'class'      => 'btn-update',
                            'title'      => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax'  => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
                    },
                    'delete' => function ($url, Cake $model) {
                        $options = [
                            'class'        => 'btn-delete',
                            'title'        => Yii::t('yii', 'Delete'),
                            'aria-label'   => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                            'data-pjax'    => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                    }
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
