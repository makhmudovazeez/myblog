<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\NewsInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-information-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'news_id')->dropDownList(
                ArrayHelper::map(common\models\News::find()->all(), 'id', 'title'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
    </div>
    <?= $form->field($model, 'photo')->fileInput()->label('Image') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
