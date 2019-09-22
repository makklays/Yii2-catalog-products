<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) . (isset($total) ? ' ('.$total.')' : '') ?></h1>
        </div>
        <div class="col-md-6 text-right">
            <div style="margin-top:22px;">
                <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php if(isset($categories) && !empty($categories)): ?>
                <div class="row">
                    <?php foreach($categories as $cat): ?>
                        <div class="col-md-3 text-center" style="margin-bottom:20px;">
                            <div style="vertical-align:bottom; height:100px; border:1px solid #CCC; border-radius: 4px;">

                                <div style="padding:30px 0 0 0;">
                                    ID: <?=$cat['id']?> <br/>

                                    <a href="/category-view/<?=$cat['id']?>/1"><?=$cat['title']?></a>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div>Нет категорий</div>
            <?php endif; ?>
        </div>
    </div>

    <?= $this->render('../parts/paging', [
        'total' => $total,
        'page' => $page,
        'all_pages' => $all_pages,
        'page_link' => 'category',
    ]) ?>

</div>
