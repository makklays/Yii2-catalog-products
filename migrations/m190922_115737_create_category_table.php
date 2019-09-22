<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m190922_115737_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
        ]);

        $item = new Category();
        $item->id = 1;
        $item->title = 'Для дома';
        //$item->title_en = 'Для дома'; :) будет английская версия сайта Ж))
        $item->description = 'Всё для дома! Перечеслять нет смысла и так всё ясно - всё сприсутствует!';
        $item->save();

        $item = new Category();
        $item->id = 2;
        $item->title = 'Для отношений';
        $item->description = 'Всё для отношений! С того чем они наинаются и чем необходимо польоваться регуляно)';
        $item->save();

        $item = new Category();
        $item->id = 3;
        $item->title = 'Для детей';
        $item->description = 'Всё для детей! Для их хобби, обучения и занятий';
        $item->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
