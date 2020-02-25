<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsTranslate */

$this->title = 'Create News Translate';
$this->params['breadcrumbs'][] = ['label' => 'News Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
