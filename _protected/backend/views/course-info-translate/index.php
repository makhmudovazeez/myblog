<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseInfoTranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Info Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-info-translate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course Info Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'course_info_id',
            [
                'attribute' => 'lang_id',
                'label' => 'Language',
                'value' => function ($data) {
                    return $data->langId;
                },
            ],
            'information',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
