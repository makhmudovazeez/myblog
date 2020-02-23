<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'login');
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?=$this->title?>
                </h1>
                <p class="text-white link-nav"><a href="index.html">login </a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<div class="bg-gray">
    <div class="fixer"></div>
    <div class="container pb-5">
        <div class="login-content mt-5 mb-0">
            <h2 class="text-header mt-0 mb-3 text-center">Kirish</h2>
            <?php $form =  \yii\bootstrap\ActiveForm::begin([
                'action' => toRoute('/site/login'),
                'method' => 'POST'
            ])?>

            <?= $form->field($model, 'username')->input('text', [
                'placeholder' => 'Login yoki email *'
            ])->label(false)?>

            <?= $form->field($model, 'password')->input('password', [
                'placeholder' => 'Parol *'
            ])->label(false)?>

            <?= $form->field($model, 'rememberMe', [
                'template' => '
                        <label class="custom-control custom-radio">
                          {input}
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Meni yodda saqla</span>
                        </label>
                        <a class="pull-right text-danger" href="'.toRoute('/site/requestpasswordreset').'">Parolni unutdingizmi ?</a>
                    '
            ])->input('checkbox', [
                'placeholder' => 'Password *',
                'class' => 'custom-control-input'
            ])->label(false)?>

            <?=\yii\helpers\Html::submitButton('LOGIN');?>

            <?php \yii\bootstrap\ActiveForm::end();?>

            <div class="w-100 login-inner text-center pt-4">
                <span>Yoki</span>

                <a href="#" class="btn btn-facebook w-100">
                    <i class="fa fa-facebook"></i>
                    Facebook bilan kirish
                </a>

                <a href="#" class="btn btn-google w-100">
                    <i class="fa fa-google"></i>
                    Google bilan kirish
                </a>

            </div>

            <div class="w-100 text-center text-description">Profilingiz yo'qmi? <a class="text-danger" href="<?=toRoute('/site/signup')?>">Ro'yhatdan o'tish</a></div>
        </div>
    </div>
</div>