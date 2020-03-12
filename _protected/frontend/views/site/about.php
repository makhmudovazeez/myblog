<?php
use yii\helpers\Url;
$this->title = Yii::t('app', 'About');
?>
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?=t("About")?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start popular-courses Area -->
<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class='row'>
            <p>
                <?=$model->information?>
            </p>
        </div>
    </div>
</section>
<!-- End popular-courses Area -->