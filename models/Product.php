<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property string $photos
 * @property string $price
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title'], 'required'],
            [['category_id'], 'integer'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['photos'], 'file', 'extensions' => 'png, jpg, gif, jpeg', 'maxFiles' => 4],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => Yii::t('app', 'Category ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'photos' => Yii::t('app', 'Photos'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /*public function upload()
    {
        if ($this->validate()) {
            foreach ($this->photos as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }*/

    /*public function uploadImage($prev_pic = NULL)
    {
        // add directory
        $path = Yii::$app->basePath . '/web/uploads/pics/' . $this->id;
        if (!file_exists($path)) {
            mkdir($path, 0700);
        }

        // upload file
        $arr_photo = [];
        $files = UploadedFile::getInstance($this, 'photos');
        if (isset($files) && !empty($files)) {
            foreach($files as $file) {
                if (isset($file->baseName) && !empty($file->baseName)) {
                    $filename = $file->baseName . '.' . $file->extension;
                    $file->saveAs(Yii::$app->basePath . '/web/uploads/pics/' . $this->id . '/' . $filename);
                    //$this->photos = (string)$filename;
                } else {
                    //$this->photos = (string)$prev_pic;
                }
                $arr_photo[] = $filename;
            }
            $this->title = 'werwert';
            //$this->photos = implode(',', $arr_photo);

            echo '<pre>';
            print_r($this->photo);
            echo '</pre>';
            exit;
        }
        $this->save();
    }*/

    /**
     * {@inheritdoc}
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id'] );
    }

    /**
     * {@inheritdoc}
     */
    public function getFeedbacks()
    {
        return $this->hasMany(ProductFeedback::className(), ['product_id' => 'id'] )->orderBy('modified_at desc');
    }
}
