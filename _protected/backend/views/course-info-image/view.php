<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CourseInfoImage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Info Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-info-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'course_info_id',
            'float',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($photo){
                    return Html::img("../../../uploads/courseinfoimg/" . $photo->image, ['style' => 'width:150px']);
                }
            ],
        ],
    ]) ?>

</div>