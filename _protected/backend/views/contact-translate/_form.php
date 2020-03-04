<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\ContactTranslate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-translate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'contact_id')->dropDownList(
                ArrayHelper::map(common\models\Contact::find()->all(), 'id', 'email'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'lang_id')->dropDownList(
                ArrayHelper::map(common\models\Lang::find()->all(), 'id', 'name'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
    </div>
    <?= $form->field($model, 'address')->textArea(['maxlength' => true, 'rows' => '4']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>