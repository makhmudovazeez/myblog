<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactTranslateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contact Translates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-translate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contact Translate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'address',
            [
                'attribute' => 'lang_id',
                'label' => 'Language',
                'value' => function ($data) {
                    return $data->langId;
                },
            ],
            [
                'attribute' => 'email',
                'label' => 'Email',
                'value' => function ($data) {
                    return $data->Email;
                },
            ],
            [
                'attribute' => 'phone',
                'label' => 'Phone',
                'value' => function ($data) {
                    return $data->Phone;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
