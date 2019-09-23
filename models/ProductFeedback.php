<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "product_feedback".
 *
 * @property int $id
 * @property int $product_id
 * @property string $username
 * @property string $email
 * @property string $message
 * @property string $modified_at
 */
class ProductFeedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'username', 'email', 'modified_at', 'message'], 'required'],
            [['product_id'], 'integer'],
            [['message'], 'string'],
            [['modified_at'], 'safe'],
            [['username', 'email'], 'string', 'max' => 255],
            //[['email'], 'unique'], - не уникален, могу писать отзывы на разные товары
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => Yii::t('app', 'Product ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'message' => Yii::t('app', 'Message'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id'] );
    }
}
