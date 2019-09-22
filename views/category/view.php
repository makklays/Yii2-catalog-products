<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['category/']];
$this->params['breadcrumbs'][] = 'Category'. ' - ' . $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="category-view">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-md-6 text-right">
            <div style="margin-top:22px;">
                <?= Html::a('Add product', ['product/create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a('Update category', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete category', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="alert" style="border:1px solid #CCC; border-radius:4px;">
                <?=nl2br($model->description)?>
            </div>
        </div>
    </div>

    <!--
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
        ],
    ]) ?>
    -->

    <div class="row">
        <div class="col-md-12">
            <?php if(isset($products) && !empty($products)): ?>
                <div class="row">
                    <?php foreach($products as $pro): ?>
                        <div class="col-md-3 text-center" style="margin-bottom:20px;">
                            <div style="vertical-align:bottom; height:200px; border:1px solid #CCC; border-radius: 4px;">

                                <div style="padding:100px 0 0 0;">
                                    ID: <?=$pro['id']?> <br/>

                                    <a href="/product/?id=<?=$pro['id']?>"><?=$pro['title']?></a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">Нет продуктов в этой категории</div>
            <?php endif; ?>
        </div>
    </div>

    <?= $this->render('../parts/paging', [
        'total' => $total,
        'page' => $page,
        'all_pages' => $all_pages,
        'page_link' => 'category-view/'.$model->id,
    ]) ?>

</div>
