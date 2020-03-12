<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$this->title = Yii::t('app', "Home");
?>


<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 class="text-uppercase">
                    We Ensure better education
                    for a better world
                </h1>
                <p class="pt-10 pb-10">
                    In the history of modern astronomy, there is probably no one greater leap forward than the building
                    and launch of the space telescope known as the Hubble.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start feature Area -->
<section class="feature-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4><?=t("Learn Online Courses")?></h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            <?=t("Usage of the Internet is becoming more common due to rapid advancement
                            of technology.")?>
                        </p>
                        <a href="<?=Url::to(['category'])?>">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4><?=t("News")?></h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            <?=t("For many of us, our very first experience of learning about the celestial bodies begins when
                            we saw our first.")?>
                        </p>
                        <a href="<?=Url::to(['news'])?>"><?=t("Join Now")?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4><?=t("About")?></h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            <?=t("If you are a serious astronomy fanatic like a lot of us are, you can probably remember that
                            one event.")?>
                        </p>
                        <a href="<?=Url::to(['about'])?>"><?=t("Join Now")?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feature Area -->

<!-- Start upcoming-event Area -->
<section class="upcoming-event-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=t("Types of Courses")?></h1>
                    <p><?=t("If you are a serious astronomy fanatic like a lot of us")?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-upcoming-event-carusel">
                <?php foreach($category as $categ): ?>
                <div class="single-carusel row align-items-center">
                    <div class="col-12 col-md-6 thumb">
                        <img class="/uploads/img-fluid" src="/uploads/category/<?=$categ->image?>" alt="">
                    </div>
                    <div class="detials col-12 col-md-6">
                        <p><?=$categ->created_at?></p>
                        <a href="<?=Url::to(['courses', 'id' => $categ->id, 'type' => "all"])?>">
                            <h4><?=$categ->type?></h4>
                        </a>
                        <p>
                            <?=$categ->description?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End upcoming-event Area -->

<!-- Start search-course Area -->
<section class="search-course-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="text-white">
                    <?=t("Comments")?>
                </h1>
                <div class="row details-content">
                    <div class="col single-detials">
                        <h4><?=t("If you want any feedback, you can write your opinion on the input field and send!")?>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 search-course-right section-gap">
                <?php $form = ActiveForm::begin(['options' => ['class' => 'form-wrap']]); ?>
                <h4 class="text-white pb-20 text-center mb-30"><?=t("Leave your review")?></h4>
                <?php if(Yii::$app->user->isGuest):?>
                <?=$form->field($model, 'name')->textInput(["placeholder"=>"Your Name"])->label(false)?>
                <?=$form->field($model, 'surname')->textInput(["placeholder"=>"Your Surname"])->label(false)?>
                <?php endif; ?>
                <?=$form->field($model, 'message')->textarea(["placeholder"=>"Your Comment", "rows"=>"4"])->label(false)?>

                <button class="primary-btn text-uppercase">Send</button>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<!-- End search-course Area -->

<!-- Start review Area -->
<section class="review-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row">
            <div class="active-review-carusel">
                <?php foreach($comments as $comment): ?>
                <div class="single-review item">
                    <div class="title justify-content-start d-flex">
                        <?php if($comment->last && $comment->first): ?>
                        <h4><?=$comment->last?> <?=$comment->first?></h4>
                        <?php else :?>
                        <h4><?=$comment->name?> <?=$comment->surname?></h4>
                        <?php endif; ?>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                    </div>
                    <p>
                        <?=$comment->message?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End review Area -->
<?php if($news):?>
<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=t("The Lastest News I`ve posted")?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($news as $new): ?>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="/uploads/img-fluid" src="/uploads/news/<?=$new->image?>" alt="">
                </div>
                <a href="<?=Url::to(['news-info', 'id' => $new->id, 'type' => "news"])?>">
                    <h5><?=$new->title?></h5>
                </a>
                <p>
                    <?=$new->message?>
                </p>
                <a href="<?//Yii\helpers\Url::to(['news'])?>"
                    class="details-btn d-flex justify-content-center align-items-center"><span
                        class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif;?>

<!-- End blog Area -->