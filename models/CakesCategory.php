<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cakes_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Cake[] $cakes
 */
class CakesCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cakes_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'alias' => 'Alias',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCakes()
    {
        return $this->hasMany(Cake::className(), ['category_id' => 'id']);
    }


    /**
     * @return array | null
     */
    public static function getCategoryList()
    {
        $models = self::find()->all();
        if(!$models){
            return null;
        }

        return ArrayHelper::map($models, 'id', 'name');
    }
}
