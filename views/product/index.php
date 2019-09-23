<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Categories'), 'url' => ['category/']];
$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['category-view/'.$model->category->id.'/1']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Product'). ' - '. $this->title;
?>

<div class="product-view">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-6 text-right" style="margin-top:22px;">
            <p>
                <?= Html::a(Yii::t('app','Update product'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app','Delete product'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
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
            [
                'format' => 'raw',
                'attribute' => Yii::t('app', 'Category'),
                'value' => function($dp){
                    return Html::a($dp->category->title, ['category-view/'.$dp->category->id.'/1']);
                }
            ],
            'title',
            'description:ntext',
            //'photos',
            [
                'format' => 'raw',
                'attribute' => 'photos',
                'value' => function($dp){
                    $str = NULL;
                    if (!empty($dp->photos)) {
                        $files = explode(',', $dp->photos);
                        foreach ($files as $photo) {
                            $str .= Html::img('/uploads/photos/'.$dp->id.'/'.$photo, ['style' => 'width:200px; margin-right:10px;']);
                        }
                    }
                    return $str;
                }
            ],
            'price',
        ],
    ]) ?>

    <!-- feedbacks -->
    <div class="row">
        <div class="col-md-6">
            <h2 id="feedbacks"><?=Yii::t('app', 'Product feedbacks')?> <?=(isset($model->feedbacks) && !empty($model->feedbacks) ? ' ('.count($model->feedbacks).')' : '(0)')?></h2>
        </div>
        <div class="col-md-6 text-right" style="margin-top:22px;">
            <?= Html::a(Yii::t('app','Add feedback'), ['product-feedback/create/'.$model->id], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php if (isset($model->feedbacks) && !empty($model->feedbacks)): ?>
        <?php foreach($model->feedbacks as $feedback): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert" style="border:1px #e7e7e7 solid; border-radius: 4px;">

                        <?=$feedback->username?> | <a href="mailto:<?=$feedback->email?>" target="_blank" ><?=$feedback->email?></a>
                        | <?=$feedback->modified_at?> |
                        <?= Html::a(Yii::t('app', 'Edit'), ['product-feedback/update', 'id' => $feedback->id], ['class' => '']) ?> |
                        <?= Html::a(Yii::t('app', 'Delete'), ['product-feedback/delete', 'id' => $feedback->id], [
                            'class' => '',
                            'data' => [
                                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                'method' => 'post',
                            ],
                        ]) ?> <br/>

                        <?=nl2br($feedback->message)?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>