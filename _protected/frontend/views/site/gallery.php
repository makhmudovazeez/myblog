<?php
?>
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?=t("Gallery")?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start gallery Area -->
<section class="gallery-area section-gap">
    <div class="container">
        <div class="row">
            <?php foreach($gallery as $image): ?>
            <div class="col-lg-<?=$image->size?>">
                <a href="/uploads/gallery/<?=$image->image?>" class="img-gal">
                    <div class="single-imgs relative">
                        <div class="overlay overlay-bg"></div>
                        <div class="relative">
                            <img class="img-fluid" src="/uploads/gallery/<?=$image->image?>" alt="">
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End gallery Area -->