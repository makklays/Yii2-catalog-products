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
            [['category_id', 'title', 'price'], 'required'],
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
