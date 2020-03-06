<?php

?>
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Category
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
                    <h1 class="mb-10">Popular Courses we offer</h1>
                    <p>There is a moment in the life of any aspiring.</p>
                </div>
            </div>
        </div>
        <div class="row">
        <?php foreach($model as $course):?>
        <?php if($course->title && $course->title != 'No Translate'): ?>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="/uploads/course/<?=$course->image?>" alt="">
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.html">
                        <h4>
                            <?= $course->title?>
                        </h4>
                    </a>
                    <p>
                        <?=$course->description?>
                    </p>
                </div>
            </div>
        <?php endif; endforeach;?>
        </div>
        <a href="#" class="primary-btn text-uppercase mx-auto">Load More Courses</a>
    </div>
    </div>
</section>
<!-- End popular-courses Area -->
