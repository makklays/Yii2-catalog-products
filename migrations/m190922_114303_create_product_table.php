<?php

use app\models\Product;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m190922_114303_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11)->notNull(),
            'title' => $this->string(255)->notNull(), // ru
            'title_en' => $this->string(255)->defaultValue(NULL), // en
            'description' => $this->text(), // ru
            'description_en' => $this->text(), // en
            'photos' => $this->string(255)->defaultValue(NULL),
            'price' => $this->decimal(19,2),
        ]);

        $item = new Product();
        $item->category_id = 1;
        $item->title = 'Мыло хозяйственное 78%';
        $item->description = 'Описанние простого хозяйственного мыла 78%';
        $item->photos = 'email.jpg,IMG_2019.jpg';
        $item->price = 100.00;
        $item->save();

        $item = new Product();
        $item->category_id = 2;
        $item->title = 'Кольцо обручальное';
        $item->description = 'Описанние обручального кольца) без толстой фото-модели';
        $item->photos = '21004082.jpg,obruchalnoe-koltso.jpg';
        $item->price = 6000.00;
        $item->save();

        $item = new Product();
        $item->category_id = 1;
        $item->title = 'Черный пояс';
        $item->description = 'Описание черного пояса к кимано';
        $item->photos = 'kimono.jpg,progress-m6-kimono.jpg';
        $item->price = 30.00;
        $item->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
