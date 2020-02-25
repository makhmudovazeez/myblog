<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CategoryTranslate */

$this->title = 'Create Category Translate';
$this->params['breadcrumbs'][] = ['label' => 'Category Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
