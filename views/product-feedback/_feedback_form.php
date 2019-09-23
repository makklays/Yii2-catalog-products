<?php
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="product-feedback-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <?= $form->field($model, 'product_id')->hiddenInput()->label(false); ?>

        <div class="col-md-3">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'modified_at')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => Yii::t('app', 'Date')],
                'language' => 'ru',
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>