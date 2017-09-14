<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
     * @var UploadedFile;
     */
    public $imageFile;

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
            [['name'], 'required'],
            [['views'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'image'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['image'], 'safe'],
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

    public function upload()
    {
        if ($this->validate()) {
            $fileName = $this->imageFile->name;
            $this->imageFile->saveAs('uploads/' . $fileName, false);
            $this->image = $fileName;
            return true;
        } else {
            return false;
        }
    }
}
