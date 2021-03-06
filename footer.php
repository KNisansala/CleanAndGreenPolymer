<?php
$PRODUCT_CATEGORY = new ProductCategory(NULL);
$categories = $PRODUCT_CATEGORY->all();
?>
<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Footer About -->
                    <div class="single-widget footer-about widget">
                        <div class="logo">
                            <h3 class="widget-title">About Us</h3>
                        </div>
                        <div class="footer-widget-about-description">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown book.</p>
                        </div>
                        <div class="social">
                            <!-- Social Icons -->
                            <ul class="social-icons">
                                <li><a class="facebook" href="javascript:void(0)" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter" href="javascript:void(0)" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="linkedin" href="javascript:void(0)" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="pinterest" href="javascript:void(0)" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Footer About -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Footer Links -->
                    <div class="single-widget f-link widget">
                        <h3 class="widget-title">Company</h3>
                        <ul>
                            <li><a href="about-us.php">About Us</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="product-categories.php">Products</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="contact-us.php">Contact us</a></li>
                        </ul>
                    </div>
                    <!--/ End Footer Links -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Footer News -->
                    <div class="single-widget f-link widget">
                        <h3 class="widget-title">Product Categories</h3>
                        <ul>
                            <?php
                            if (count($categories) > 0) {
                                foreach ($categories as $key => $category) {
                                    if ($key < 5) {
                            ?>
                                        <li><a href="view-product.php?id=<?= $category['id']; ?>"><?= $category['name']; ?></a></li>
                                <?php
                                    }
                                }
                            } else {
                                ?>
                                <li><a href="#">No any product categories</a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <!--/ End Footer News -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Footer Contact -->
                    <div class="single-widget footer_contact widget">
                        <h3 class="widget-title">Contact</h3>
                        <p>Beatae vitae dicta sunt explicabo nemo enim ipsam voluptatem</p>
                        <ul class="address-widget-list">
                            <li class="footer-mobile-number"><i class="fa fa-phone"></i>+(94) 11 366 3500</li>
                            <li class="footer-mobile-number"><i class="fa fa-envelope"></i>info@cleanandgreenpolymer.com</li>
                            <li class="footer-mobile-number"><i class="fa fa-map-marker"></i> No 55, Isipathanarama Rd, Navinna, Maharagama.</li>
                        </ul>
                    </div>
                    <!--/ End Footer Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-content">
                        <!-- Copyright Text -->
                        <p>&copy; <span id="year"></span> Clean & Green Polymer. Designed By <a href="https://www.synotec.lk">Synotec Holdings (pvt) Ltd.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Copyright -->
</footer>