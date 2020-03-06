<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model common\models\CategoryTranslate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-translate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList(
                ArrayHelper::map(common\models\Category::find()->all(), 'id', 'id'),
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
    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
        ],
    ]); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>