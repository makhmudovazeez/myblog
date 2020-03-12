<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AboutTranslate;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\About */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="about-form">

<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach (\common\models\Lang::find()->all() as $lg) : ?>
    <?php if(!$model->isNewRecord) {
                    $translate = AboutTranslate::findOne(['about_id' => $model->id, 'lang_id' => $lg->id]);
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
        <?= Html::submitButton('Save' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
