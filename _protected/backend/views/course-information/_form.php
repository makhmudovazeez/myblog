<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use common\models\CourseInfoTranslate;
/* @var $this yii\web\View */
/* @var $model common\models\CourseInformation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-information-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'course_id')->dropDownList(
                ArrayHelper::map(common\models\Course::find()->all(), 'id', 'title'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
        <?php if(!$model->isNewRecord) {
        $translate = CourseInfoTranslate::findOne(['course_info_id' => $model->id]);
        $model->floatb = $translate ? $translate->float : "";
        }
    ?>
        <div class="col-md-6">
            <?= $form->field($model, 'floatb')->dropDownList(
                $model->floats,
                [
                    'prompt' => 'Choose'
                ]
            )->label('Float') ?>
        </div>
    </div>
    <?= $form->field($model, 'photo')->fileInput()->label('Image') ?>
    <?php foreach (\common\models\Lang::find()->all() as $lg) : ?>
    <?php if(!$model->isNewRecord) {
        $translate = CourseInfoTranslate::findOne(['course_info_id' => $model->id, 'lang_id' => $lg->id]);
        $model->informationb[$lg->id] = $translate ? $translate->information : "";
        }
    ?>
    <?= $form->field($model, "informationb[$lg->id]")->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ])->label("Information ($lg->name)")?>
    <?php endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>