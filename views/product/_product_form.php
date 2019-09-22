<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList(
                $droplist_cats,
                [
                    'prompt' => '-- Choose category --',
                    'multiple' => false,
                    //'selected' => 'selected'
                ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'photos')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>