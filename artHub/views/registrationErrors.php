<?php require('artHubHeader.php'); ?>


</div><!-- end presso-preloader -->
    <div class="main-wrapper col-xs-12">
        <div class="mask-inner col-xs-12">
            <section class="presso-header col-xs-12" data-background="https://www.placecage.com/g/800/800">
                
                <div class="presso-nav top-section col-xs-12">
                    <h1>Register</h1>
                    <p>or</p>
                    <ul>
                        <li>
                            <a href="?ctlr=admin&amp;action=login">Sign In</a>
                        </li>
                        <li><span>/</span></li>
                        <li>
                            <a class="active">Register</a>
                        </li>
                    </ul>
                    <b>
                        <i class="fa fa-angle-double-down"></i>
                    </b>
                </div>
                <!-- end presso-nav -->
                <!-- end main-header -->
            </section>
            <!-- edn presso-header -->
            <section class="contact-box top-section col-xs-12">
                <div class="container">
                    <!-- end contact-map -->
                    <div class="contact-data col-xs-12">
                        <div class="contact-form col-md-8 col-xs-12">
                        <h1>Please fix the following errors: </h1>
                            <!-- <p>Add code to display validation and sanitization errors</p> -->
                            <p><?php print_r($vm->errorMsg); ?></p>
                        </div>
                        <!-- end contact-details -->
                    </div>
                    <!-- end contact-data -->
                </div>
                <!-- end container -->
            </section>
            <!-- end contact-box -->
            <section class="purchase-item col-xs-12">
                <div class="container">
                    <p>
                        <b class="fa fa-thumbs-o-up"></b>
                        <span>Bring your art to the world with ArtHub</span>
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> discover more
                        </a>
                    </p>
                </div>
                <!-- end container -->
            </section>
            <!-- end purchase-item -->
            
            <div class="toTop col-xs-12 text-center">
                <i class="fa fa-angle-up"></i>
            </div>
            <!-- end toTop -->
        </div>
        <!-- end mask-inner -->
        <div class="wrap-pop col-xs-12"></div>
    </div>
    <!-- end main-wrapper -->



    <!-- Javascript Files -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/jquery.mixitup.js" type="text/javascript"></script>
    <script src="js/jquery-smoothscroll.js" type="text/javascript"></script>
    <script src="js/modernizr.min.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/placeholdem.min.js" type="text/javascript"></script>
    <script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="js/fire.js" type="text/javascript"></script>
    <script src="js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
    <script src="js/jquery.appear.js" type="text/javascript"></script>
    <script src="js/jquery.countTo.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>

    <?php require('artHubFooter.php');
