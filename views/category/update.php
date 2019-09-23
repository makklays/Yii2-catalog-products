<?php
use yii\helpers\Html;

$this->title = Yii::t('app','Update category') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Categories'), 'url' => ['category/']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['category-view/'.$model->id.'/1']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_cat_form', [
        'model' => $model,
    ]) ?>

</div>
