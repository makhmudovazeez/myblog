<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\NewsTranslate;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <li><a class="fa fa-arrow-right" href="<?=toRoute('/category/index')?>">Index</a>
        </li>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'photo')->fileInput()->label('Image') ?>
    <?php foreach (\common\models\Lang::find()->all() as $lg) : ?>
    <?php if(!$model->isNewRecord) {
        $translate = NewsTranslate::findOne(['news_id' => $model->id, 'lang_id' => $lg->id]);
        $model->title[$lg->id] = $translate ? $translate->title : "";
        $model->message[$lg->id] = $translate ? $translate->message : "";
        }
    ?>
    <?= $form->field($model, "titleb[$lg->id]")->textInput(['maxlength' => true])->label("Title ($lg->name)")?>
    <?= $form->field($model, "messageb[$lg->id]")->widget(CKEditor::className(),[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                ],
            ])->label("Message ($lg->name)")?>
    <?php endforeach; ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>


</div>