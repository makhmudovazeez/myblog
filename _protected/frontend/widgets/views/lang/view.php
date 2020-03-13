<?php
use yii\helpers\Html;
?>

<?php foreach ($langs as $lang):
    if($lang->url != $lang_id):
    ?>
    <li>
        <?= Html::a($lang->name, '/'.$lang->url.Yii::$app->getRequest()->getLangUrl()) ?>
    </li>
<?php endif; endforeach;?>