<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ContactTranslate */

$this->title = 'Create Contact Translate';
$this->params['breadcrumbs'][] = ['label' => 'Contact Translates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-translate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
