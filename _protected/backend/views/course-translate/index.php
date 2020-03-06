<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseTranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-translate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'course_id',
            [
                'attribute' => 'lang_id',
                'label' => 'Language',
                'value' => function ($data) {
                    return $data->langId;
                },
            ], 
            'description',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
