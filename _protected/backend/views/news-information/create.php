<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsInformation */

$this->title = 'Create News Information';
$this->params['breadcrumbs'][] = ['label' => 'News Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
