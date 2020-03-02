<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategoryTranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Category Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-translate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Category Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type',
            [
                'attribute' => 'lang_id',
                'label' => 'Language',
                'value' => function ($data) {
                    return $data->langId;
                },
            ],
            'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
