<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NewsInformationTranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News Information Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-information-translate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News Information Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'news_info_id',
            [
                'attribute' => 'lang_id',
                'label' => 'Language ID',
                'value' => function ($data) {
                    return $data->langId;
                },
            ],            
            'information',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>