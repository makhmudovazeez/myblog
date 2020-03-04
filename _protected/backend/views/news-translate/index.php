<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsTranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-translate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            'news_id',
            [
                'attribute' => 'lang_id',
                'label' => 'Language',
                'value' => function ($data) {
                    return $data->langId;
                },
            ],
            'message',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
