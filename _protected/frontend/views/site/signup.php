<?php
use nenad\passwordStrength\PasswordInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = Yii::t('app', 'Registration');
$this->params['breadcrumbs'][] = $this->title;

?>


<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?=t("Registration")?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<div class="bg-gray pb-4">
    <div class="container">
        <div class="fixer"></div>
        <div class="login-content mt-0 mb-0">
            <h2 class="text-header mt-0 mb-3 text-center"><?=t("Registration")?></h2>
            <?php $form =  \yii\bootstrap\ActiveForm::begin([
                'action' => toRoute('/site/signup'),
                'method' => 'POST',
                'options' => [
                    'enctype' => 'multipart/form-data',
                    'id' => 'official-signup'
                ]
            ])?>

            <?= $form->field($model, 'first')->input('text', [
                'placeholder' => t('First name *')
            ])->label(false)?>

            <?= $form->field($model, 'last')->input('text', [
                'placeholder' => t('Last name *')
            ])->label(false)?>

            <?= $form->field($model, 'username')->input('text', [
                'placeholder' => t('Username *')
            ])->label(false)?>

            <?= $form->field($model, 'email')->input('email', [
                'placeholder' => t('Email Address *')
            ])->label(false)?>

            <?= $form->field($model, 'password')->input('password', [
                'placeholder' => t('Password *')
            ])->label(false)?>

            <?= $form->field($model, 'confirm_password')->input('password', [
                'placeholder' => t('Confirm password *')
            ])->label(false)?>

            <?= $form->field($model, 'file', [
                'template' => '
                    <label class="custom-file w-100">
                      {input}
                      <span class="custom-file-control form-control-file"></span>
                      <span class="">{error}</span>
                    </label>
                '
            ])->fileInput([
                'class' => 'border-0 custom-file-input'
            ])->label(false);?>

            <?= $form->field($model, 'agreement', [
                'template' => '
                    <label class="custom-control custom-radio pt-3">
                      {input}
                      <span class="custom-control-indicator mt-3"></span>
                      <span class="custom-control-description">I agree with the <a href="'.toRoute('/site/termsandconditions').'" class="text-danger">Terms & Conditions</a></span>
                    </label>
                    {error}
                '
            ])->input('checkbox', [
                'class' => 'custom-control-input'
            ])->label(false)?>
            <span class="w-100 text-center text-description"><?=t("Do you have an account?")?><a class="text-danger"
                    href="<?=toRoute('/site/login')?>"><?=t("Login")?></a></span>
            <?=\yii\helpers\Html::submitButton(t('Sign up'));?>

            <?php \yii\bootstrap\ActiveForm::end();?>

            <div class="w-100 login-inner text-center pt-4">
                <span>OR</span>

                <a href="#" class="btn btn-facebook w-100">
                    <i class="fa fa-facebook"></i>
                    <?=t("sign in with facebook")?>
                </a>

                <a href="#" class="btn btn-google w-100">
                    <i class="fa fa-google"></i>
                    <?=t("sign in with google")?>
                </a>

            </div>

        </div>
    </div>
</div>