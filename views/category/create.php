<?php
use yii\helpers\Html;

$this->title = Yii::t('app','Create category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['category/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_cat_form', [
        'model' => $model,
    ]) ?>

</div>
