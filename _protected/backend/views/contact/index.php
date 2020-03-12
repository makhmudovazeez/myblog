<?php

use common\models\ContactTranslate;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-Index">

<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'telegram')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?php foreach (\common\models\Lang::find()->all() as $lg) : ?>
    <?php if(!$model->isNewRecord) {
                    $translate = ContactTranslate::findOne(['contact_id' => $model->id, 'lang_id' => $lg->id]);
                    $model->address[$lg->id] = $translate ? $translate->address : "";
                }
            ?>

    <?= $form->field($model, "address[$lg->id]")->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ])->label("Address ($lg->name)")?>
    <?php endforeach; ?>

    <div class="form-group">
        <?= Html::submitButton('Save' , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
