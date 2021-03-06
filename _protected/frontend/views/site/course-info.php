<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    <?=t("Course Information")?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Start popular-courses Area -->
<section class="popular-courses-area section-gap courses-page">
    <div class="row">
        <?php foreach($model as $info): ?>
        <div class="container">
            <div class="thumb-wrap relative">
                <div class="thumb relative">
                    <img class="img-fluid" src="/uploads/courseinfo/<?= $info->image;?>" width="400" height="480"
                        style="float: <?=$info->float?>; margin: 0 10px 7px 10px">
                </div>
            </div>
            <p>
                <?=$info->info?>
            </p>
        </div>
    </div>
    <?php endforeach;?>
    </div>
</section>

<!-- End popular-courses Area -->
