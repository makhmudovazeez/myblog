<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseInfoTranslate */

$this->title = 'Create Course Info Translate';
$this->params['breadcrumbs'][] = ['label' => 'Course Info Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-info-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
