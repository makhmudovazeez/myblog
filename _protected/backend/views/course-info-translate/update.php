<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseInfoTranslate */

$this->title = 'Update Course Info Translate: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Info Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-info-translate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
