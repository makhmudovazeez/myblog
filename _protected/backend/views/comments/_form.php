<?php
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'user_profile_id')->dropDownList(
                ArrayHelper::map(common\models\UserProfile::find()->all(), 'id', 'username'),
                [
                    'prompt' => 'Choose'
                ]
            ) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <?= $form->field($model, 'message')->widget(CKEditor::className(),[
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