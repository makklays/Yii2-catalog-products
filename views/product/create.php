<?php
use yii\helpers\Html;

$this->title = Yii::t('app','Create product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Categories'), 'url' => ['category/']];

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_product_form', [
        'model' => $model,
        'droplist_cats' => $droplist_cats,
    ]) ?>

</div>