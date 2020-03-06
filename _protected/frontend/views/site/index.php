<?php
/* @var $this yii\web\View */
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
                <a href="#" class="primary-btn text-uppercase">Get Started</a>
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
                        <h4>Learn Online Courses</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            Usage of the Internet is becoming more common due to rapid advancement
                            of technology.
                        </p>
                        <a href="#">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>No.1 of universities</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            For many of us, our very first experience of learning about the celestial bodies begins when
                            we saw our first.
                        </p>
                        <a href="#">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-feature">
                    <div class="title">
                        <h4>Huge Library</h4>
                    </div>
                    <div class="desc-wrap">
                        <p>
                            If you are a serious astronomy fanatic like a lot of us are, you can probably remember that
                            one event.
                        </p>
                        <a href="#">Join Now</a>
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
                    <h1 class="mb-10">Types of Courses</h1>
                    <p>If you are a serious astronomy fanatic like a lot of us</p>
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
                        <a href="#">
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
                    Get reduced fee <br>
                    during this Summer!
                </h1>
                <p>
                    inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                    standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the
                    job is beyond reproach.
                </p>
                <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-graduation-hat"></span>
                        <a href="#">
                            <h4>Expert Instructors</h4>
                        </a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advancement of technology and
                            power.
                        </p>
                    </div>
                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <a href="#">
                            <h4>Certification</h4>
                        </a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advancement of technology and
                            power.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 search-course-right section-gap">
                <form class="form-wrap" action="#">
                    <h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4>
                    <input type="text" class="form-control" name="name" placeholder="Your Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name'">
                    <input type="phone" class="form-control" name="phone" placeholder="Your Phone Number"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Phone Number'">
                    <input type="email" class="form-control" name="email" placeholder="Your Email Address"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address'">
                    <div class="form-select" id="service-select">
                        <select>
                            <option datd-display="">Choose Course</option>
                            <option value="1">Course One</option>
                            <option value="2">Course Two</option>
                            <option value="3">Course Three</option>
                            <option value="4">Course Four</option>
                        </select>
                    </div>
                    <button class="primary-btn text-uppercase">Submit</button>
                </form>
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
                        <a href="#">
                            <h4><?=$comment->last?> <?=$comment->first?></h4>
                        </a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
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


<!-- Start cta-one Area -->
<section class="cta-one-area relative section-gap">
    <div class="container">
        <div class="overlay overlay-bg"></div>
        <div class="row justify-content-center">
            <div class="wrap">
                <h1 class="text-white">Become an instructor</h1>
                <p>
                    There is a moment in the life of any aspiring astronomer that it is time to buy that first
                    telescope. It’s exciting to think about setting up your own viewing station whether that is on the
                    deck.
                </p>
                <a class="primary-btn wh" href="#">Apply for the post</a>
            </div>
        </div>
    </div>
</section>
<!-- End cta-one Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Latest posts from our Blog</h1>
                    <p>In the history of modern astronomy there is.</p>
                </div>
            </div>
        </div>
        <?php if($news):?>
        <div class="row">
            <?php foreach($news as $new): ?>
            <div class="col-lg-3 col-md-6 single-blog">
                <div class="thumb">
                    <img class="/uploads/img-fluid" src="/uploads/news/<?=$new->image?>" alt="">
                </div>
                <a href="blog-single.html">
                    <h5><?=$new->title?></h5>
                </a>
                <p>
                    <?=$new->message?>
                </p>
                <a href="#" class="details-btn d-flex justify-content-center align-items-center"><span
                        class="details">Details</span><span class="lnr lnr-arrow-right"></span></a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif;?>
    </div>
</section>
<!-- End blog Area -->