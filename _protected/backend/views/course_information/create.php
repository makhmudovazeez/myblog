<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseInformation */

$this->title = 'Create Course Information';
$this->params['breadcrumbs'][] = ['label' => 'Course Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
