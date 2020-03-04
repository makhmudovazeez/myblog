<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NewsInformation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-information-view">

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
            [
                'attribute' => 'news_id',
                'label' => 'News ID',
                'value' => function ($data) {
                    return $data->title;
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($photo){
                    return Html::img("../../../uploads/newsinfo/" . $photo->image, ['style' => 'width:150px']);
                }
            ],        ],
    ]) ?>

</div>
