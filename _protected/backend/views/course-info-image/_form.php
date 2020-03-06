<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\CourseInfoImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-info-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'course_info_id')->dropDownList(
                ArrayHelper::map(common\models\CourseInformation::find()->all(), 'id', 'title'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'float')->dropDownList(
                $model->floats,
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