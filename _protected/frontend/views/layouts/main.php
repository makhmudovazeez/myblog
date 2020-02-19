<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
Yii::$app->language = Yii::$app->languageId->url ? Yii::$app->languageId->url : 'ru';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?= $this->render('_header');?>
        <?= $content ?>
    </div>

    <?=$this->render('_footer')?>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
