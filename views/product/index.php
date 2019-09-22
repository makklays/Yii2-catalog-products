<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['category/']];
$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['category/view/', 'id' => $model->category->id]];
$this->params['breadcrumbs'][] = 'Product - '. $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-6 text-right" style="margin-top:22px;">
            <p>
                <?= Html::a('Update product', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete product', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'category_id',
            'title',
            'description:ntext',
            'photos',
            'price',
        ],
    ]) ?>

    <!-- feedbacks -->
    <div class="row">
        <div class="col-md-6">
            <h2>Отзывы о товаре <?=(isset($model->feedbacks) && !empty($model->feedbacks) ? ' ('.count($model->feedbacks).')' : '(0)')?></h2>
        </div>
        <div class="col-md-6 text-right" style="margin-top:22px;">
            <?= Html::a('Add feedback', ['product-feedback/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php if (isset($model->feedbacks) && !empty($model->feedbacks)): ?>
        <?php foreach($model->feedbacks as $feedback): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert" style="border:1px #e7e7e7 solid; border-radius: 4px;">

                        <?=$feedback->username?> - <a href="mailto:<?=$feedback->email?>" target="_blank" ><?=$feedback->email?></a> - <?=$feedback->modified_at?> -
                        <?= Html::a('Edit feedback', ['product-feedback/update', 'id' => $feedback->id], ['class' => '']) ?> <br/>
                        <?=$feedback->message?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>
