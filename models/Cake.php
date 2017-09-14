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
 * @property string $description
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
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
            [['image', 'description'], 'safe'],
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
            'description' => 'Description',
            'views' => 'Views',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Загрузка картинки.
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            if($this->imageFile == null){
                return true;
            }

            $fileName = sprintf('%s.%s', uniqid(), $this->imageFile->extension);
            $this->imageFile->saveAs('uploads/' . $fileName, false);
            $this->image = $fileName;
            return true;
        } else {
            return false;
        }
    }


    /**
     * Добавляем просмотр.
     */
    public function updateCounter()
    {
        $this->views++;
        $this->save();
    }

    /**
     * Получить URL картинки
     * @return string
     */
    public function getImageUrl()
    {
        return sprintf("uploads/%s", $this->image);

    }
}
