<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Update Feedback');
/*$this->title = Yii::t('app', 'Update Product Feedback: {name}', [
    'name' => $model->id,
]);*/
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_feedback_form', [
        'model' => $model,
    ]) ?>

</div>
