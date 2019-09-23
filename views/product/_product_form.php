<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList(
                $droplist_cats,
                [
                    'prompt' => Yii::t('app', '-- Choose category --'),
                    'multiple' => false,
                    //'selected' => 'selected'
                ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php if(isset($model->photos) && !empty($model->photos)): ?>
        <?php $files = explode(',', $model->photos); ?>
        <?php foreach($files as $file): ?>
            <?= Html::img('/uploads/photos/'.$model->id.'/'.$file, ['style' => 'width:150px; margin-right:10px;'])?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?= $form->field($model, 'photos[]')->fileInput(['accept' => 'image/*', 'multiple' => true]) ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>