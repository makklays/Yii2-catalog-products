<?php
use yii\helpers\Html;

$this->title = 'Update Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['category/']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_cat_form', [
        'model' => $model,
    ]) ?>

</div>
