<section class="slider-area">
    <div class="home-slider owl-carousel owl-theme">
        <?php
        $SLIDER = new Slider(NULL);
        $photos = $SLIDER->all();

        foreach ($photos as $photo) {
        ?>
            <div class="single-slider single-slider-bg-1" style="background: url(upload/slider/<?= $photo['image_name']; ?>)">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12 text-center">
                                    <div class="slider-tittle one">
                                        <h3> Computor Repair Services </h3>
                                        <h1><?= $photo['title']; ?> </h1>
                                    </div>
                                    <div class="slider-btn bnt1 text-center"> <a href="services.php" class="box-btn">Services</a> <a href="contact-us.php" class="border-btn">Contact Us </a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>