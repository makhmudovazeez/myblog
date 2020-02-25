<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseTranslate */

$this->title = 'Create Course Translate';
$this->params['breadcrumbs'][] = ['label' => 'Course Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
