<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\NewsInformationTranslate */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News Information Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-information-translate-view">

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
            'news_info_id',
            [
                'attribute' => 'lang_id',
                'label' => 'Language ID',
                'value' => function ($data) {
                    return $data->langId;
                },
            ],            
            'information',
        ],
    ]) ?>

</div>
