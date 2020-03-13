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
                    <?=t("We are professionals")?>
                </h1>
                <h3 class="text-uppercase">
                    <?=t("We will teach you what we learned myself")?>
                </h3>
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
                        <h4><?=t("Learn Courses Online")?></h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            <?=t("Here are the courses that we learned and share with you")?>
                        </p>
                        <a href="<?=Url::to(['category'])?>"><?=t("Join Now")?></a>
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
                            <?=t("Here are interesting and latest news")?>
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
                            <?=t("All possible information about us")?>
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
<?php if($category):?>
<section class="upcoming-event-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=t("Types of Courses")?></h1>
                    <p><?=t("All possible course categories")?></p>
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
<?php endif; ?>
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
                <?=$form->field($model, 'name')->textInput(["placeholder"=>t("Your Name")])->label(false)?>
                <?=$form->field($model, 'surname')->textInput(["placeholder"=>t("Your Surname")])->label(false)?>
                <?php endif; ?>
                <?=$form->field($model, 'message')->textarea(["placeholder"=>t("Your Comment"), "rows"=>"4"])->label(false)?>

                <button class="primary-btn text-uppercase">Send</button>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>
<!-- End search-course Area -->

<!-- Start review Area -->
<?php if($comments):?>
<section class="review-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=t("Comments Left By Users")?></h1>
                </div>
            </div>
        </div>
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
<?php endif; ?>
<!-- End review Area -->

<!-- Start blog Area -->
<?php if($news):?>
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10"><?=t("The Lastest News We posted")?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach($news as $new): ?>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="/uploads/img-fluid" src="/uploads/news/<?=$new->image?>" alt="">
                </div>
                <h5><?=$new->title?></h5>
                <p>
                    <?=$new->message?>
                </p>
                <a href="<?=Url::to(['news-info', 'id' => $new->id, 'type' => "news"])?>"
                    class="details-btn d-flex justify-content-center align-items-center"><span
                        class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif;?>

<!-- End blog Area -->