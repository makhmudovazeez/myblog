<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\CourseTranslate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-translate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'course_id')->dropDownList(
                ArrayHelper::map(common\models\Course::find()->all(), 'id', 'id'),
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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>