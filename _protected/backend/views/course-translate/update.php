<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseTranslate */

$this->title = 'Update Course Translate: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Course Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-translate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
