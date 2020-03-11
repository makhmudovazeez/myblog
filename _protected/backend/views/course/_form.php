<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\CourseTranslate;
/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList(
                ArrayHelper::map(common\models\Category::find()->all(), 'id', 'type'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
    </div>
    <?= $form->field($model, 'photo')->fileInput()->label('Image') ?>

    <?php foreach (\common\models\Lang::find()->all() as $lg) : ?>
    <?php if(!$model->isNewRecord) {
        $translate = CourseTranslate::findOne(['course_id' => $model->id, 'lang_id' => $lg->id]);
        $model->titleb[$lg->id] = $translate ? $translate->title : "";
        $model->descriptionb[$lg->id] = $translate ? $translate->description : "";
        }
    ?>
    <?= $form->field($model, "titleb[$lg->id]")->textInput(['maxlength' => true])->label("Title ($lg->name)")?>
    <?= $form->field($model, "descriptionb[$lg->id]")->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ],
                ])->label("Description ($lg->name)")?>
    <?php endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>