<?php
use yii\helpers\Url;
$this->title = Yii::t('app', 'News');
?>
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    News
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start popular-courses Area -->
<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=t("The Lastest News I`ve posted")?></h1>
                </div>
            </div>
        </div>
        <div class="row">
        <?php foreach($model as $news):?>
        <?php if($news->title && $news->title != 'No Translate'): ?>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="/uploads/news/<?=$news->image?>" alt="">
                    </div>
                </div>
                <div class="details">
                    <a href="<?=Url::to(['news-info', 'id' => $news->id, 'type' => "news"])?>">
                        <h4>
                            <?= $news->title?>
                        </h4>
                    </a>
                    <p>
                        <?=$news->message?>
                    </p>
                </div>
            </div>
        <?php endif; endforeach;?>
        </div>
    </div>
    </div>
</section>
<!-- End popular-courses Area -->

