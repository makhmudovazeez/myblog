<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseInfoImage */

$this->title = 'Create Course Info Image';
$this->params['breadcrumbs'][] = ['label' => 'Course Info Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-info-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
