<?php
use Yii\helpers\Url;
use common\models\Contact;
use common\models\Category;
use common\models\Course;
$contact = Contact::find()->one();
$category = Category::find()->all();
$course = Course::find()->all();
?>
<header id="header" id="home">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                    <ul>
                        <?php if($contact->facebook): ?>
                        <li><a href="<?=$contact->facebook?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif;?>
                        <?php if($contact->twitter): ?>
                        <li><a href="<?=$contact->twitter?>"><i class="fa fa-twitter"></i></a></li>
                        <?php endif;?>
                        <?php if($contact->instagram): ?>
                        <li><a href="<?=$contact->instagram?>"><i class="fa fa-instagram"></i></a></li>
                        <?php endif;?>
                        <?php if($contact->telegram): ?>
                        <li><a href="<?=$contact->telegram?>"><i class="fa fa-telegram"></i></a></li>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                    <a href="tel:<?=$contact->phone?>"><span class="lnr lnr-phone-handset"></span> <span class="text"><?=$contact->phone?></span></a>
                    <a href="mailto:<?=$contact->email?>"><span class="lnr lnr-envelope"></span> <span
                            class="text"><?=$contact->email?></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="/uploads/img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="<?=Url::to(['index'])?>">HOME</a></li>
                    <li><a href="<?=Url::to(['about'])?>">ABOUT</a></li>
                    <li><a href="<?=Url::to(['gallery'])?>">GALLERY</a></li>
                    <li class="menu-has-children"><a href="<?=Url::to(['category'])?>">COURSES</a>
                        <ul>
                        <?php foreach($category as $ct): ?>
                            <li class="menu-has-children"><a href="<?=Url::to(['courses', 'id' => $ct->id, 'type' => "all"])?>"><?=$ct->title?></a>
                                <ul>
                                <?php foreach($course as $courses): ?>
                                    <?php if($courses->category_id == $ct->id): ?>
                                    <li><a href="<?=Url::to(['courses', 'id' => $courses->id, 'type' => 'courses'])?>"><?=$courses->title?></a></li>
                                    <?php endif; endforeach; ?>
                                </ul>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="<?=Url::to(['contact'])?>">CONTACt</a></li>
                    <?php if(Yii::$app->user->isGuest): ?>
                    <li><a href="<?=Url::to(['login'])?>">LOGIN</a></li>
                    <?php else: ?>
                    <li><a href="<?=Url::to(['logout'])?>" data-method="post">logout</a></li>
                    <?php endif; ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </div>
</header><!-- #header -->