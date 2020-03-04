<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>