<?php

use app\models\ProductFeedback;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_feedback}}`.
 */
class m190922_115628_create_product_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_feedback}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer(11)->notNull(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'message' => $this->text(),
            'modified_at' => $this->date(),
        ]);

        $item = new ProductFeedback();
        $item->product_id = 1;
        $item->username = 'Александр';
        $item->email = 'phpdevops@gmail.com';
        $item->message = 'Очень полезный в хозяйстве товар! Купил нравится!';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 2;
        $item->username = 'Александр';
        $item->email = 'phpdevops@gmail.com';
        $item->message = 'Какие размеры есть в наличии? У Вас какой размер?';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 2;
        $item->username = 'Марина';
        $item->email = 'm.marina@gmail.com';
        $item->message = '11-18 мм )';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 2;
        $item->username = 'Александр';
        $item->email = 'phpdevops@gmail.com';
        $item->message = 'Левая рука чешется!';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 2;
        $item->username = 'Александр';
        $item->email = 'phpdevops@gmail.com';
        $item->message = 'Планирую купить. Надеюсь на сайте есть все размеры. Сейас в поиске той, кому его подарю.';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 2;
        $item->username = 'Александр';
        $item->email = 'phpdevops@gmail.com';
        $item->message = 'Давно об этом думаю! ';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 2;
        $item->username = 'Александр';
        $item->email = 'phpdevops@gmail.com';
        $item->message = 'комментарий и отзыв! комментарий и отзыв! комментарий и отзыв!  
        
        комментарий и отзыв! комментарий и отзыв! комментарий и отзыв! ';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();

        $item = new ProductFeedback();
        $item->product_id = 1;
        $item->username = 'Марина';
        $item->email = 'm.marina@gmail.com';
        $item->message = 'Сейчас все используют стиралки - на сколько популярен товар? когда-то пользовалась!';
        $item->modified_at = date('Y-m-d H:i:s', time());
        $item->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_feedback}}');
    }
}
