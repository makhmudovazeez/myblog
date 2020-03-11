<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsInformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-information-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'news_id',
                'label' => 'News ID',
                'value' => function ($data) {
                    return $data->title;
                },
            ],
            [
                'attribute' => 'news_id',
                'label' => 'News ID',
                'value' => function ($data) {
                    return $data->title;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
