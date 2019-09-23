<?php
use yii\helpers\Html;

$this->title = Yii::t('app','Update Product').': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Categories'), 'url' => ['category/']];
$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['category/view/', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
?>

<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_product_form', [
        'model' => $model,
        'droplist_cats' => $droplist_cats,
    ]) ?>

</div>
