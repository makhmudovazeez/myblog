<?php

use common\models\CategoryTranslate;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <li><a class="fa fa-arrow-right" href="<?=toRoute('/category/index')?>">Index</a>
        </li>
    </div>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'photo')->fileInput()->label('Image') ?>
    <?php foreach (\common\models\Lang::find()->all() as $lg) : ?>
    <?= $form->field($model, "title[$lg->id]")->textInput(['maxlength' => true])->label("Type ($lg->name)")?>
    <?= $form->field($model, "description[$lg->id]")->widget(CKEditor::className(),[
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