<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cakes".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $image
 * @property integer $views
 * @property string $created_at
 * @property string $updated_at
 * @property string $description
 *
 * @property CakesCategory $cakesCategory
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
            [['name', 'category_id'], 'required'],
            [['views', 'category_id'], 'integer'],
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
            'id' => 'Ид',
            'name' => 'Название',
            'category_id' => 'Категория',
            'image' => 'Изображение',
            'description' => 'Описание',
            'views' => 'Просмотры',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
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
            $filePath = sprintf('uploads/%s', $fileName);

            $this->imageFile->saveAs($filePath, false);
            $this->image = $fileName;

            // Делаем меньшую копию
            $image = new SimpleImage();
            $image->load($filePath);
            $image->resizeToWidth(200);
            $image->save(sprintf('uploads/%s%s', '200_w_', $fileName));
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
     * @param $wight integer
     * @return string
     */
    public function getImageUrl($wight = null)
    {
        if($wight){
            //Берем картинку уменшеную
            return sprintf("uploads/%s_w_%s", $wight, $this->image);
        }
        return sprintf("uploads/%s", $this->image);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCakesCategory()
    {
        return $this->hasOne(CakesCategory::className(), ['id' => 'category_id']);
    }
}
