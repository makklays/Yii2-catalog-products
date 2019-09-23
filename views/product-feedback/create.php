<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Create Feedback');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Feedbacks'), 'url' => ['product-view/']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="product-feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_feedback_form', [
        'model' => $model,
    ]) ?>

</div>
