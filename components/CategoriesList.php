<?php
namespace app\components;

use yii\base\Widget;
use app\models\CakesCategory;

class CategoriesList extends Widget
{
    public $models = [];

    public function run()
    {
        $this->models = CakesCategory::find()->all();
        if(!$this->models){
            return '';
        }
        return $this->render('categories-list', ['models' => $this->models, 'self' => $this]);
    }

    /**
     * Check active this category in url
     * @param CakesCategory $model
     * @return bool
     */
    public function isActiveModel(CakesCategory $model)
    {
        if($this->isMainPage())
            return false;

        return $_GET['alias'] == $model->alias;
    }

    public function isMainPage()
    {
        return !isset($_GET['alias']);
    }

    /**
     * Count all items by array categories count items
     * @return int
     */
    public function getCountAllItems()
    {
        $count = 0;
        foreach($this->models as $model){
            $count += count($model->cakes);
        }
        return $count;
    }
}