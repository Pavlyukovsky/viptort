<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cakes".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $views
 * @property string $created_at
 * @property string $updated_at
 */
class Cake extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cakes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['views'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'views' => 'Views',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
