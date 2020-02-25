<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\NewsInformationTranslate */

$this->title = 'Create News Information Translate';
$this->params['breadcrumbs'][] = ['label' => 'News Information Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-information-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
