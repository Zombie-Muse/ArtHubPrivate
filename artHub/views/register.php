<?php require('artHubHeader.php'); ?>


        <div class="mask-inner col-xs-12">
            <section class="presso-header col-xs-12" data-background="https://lh3.googleusercontent.com/proxy/BeSonIHXNdMi13WA1tIKoFF3LDt9eNNG_IdXufbV5MbWCfcRgC_aaFMd1GdFlhaOMztNqp1egoGOvV_wF9D0psnC4deUI1ebh2gaGfyaGNO6XHRWG-22Uvaoj2GGCQSg7lkWOqwP8Jm8bCyRqbjO-kZN">
                
                <!-- end main-header -->
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
                    <div class="contact-data col-xs-12">
                        <div class="contact-form col-md-8 col-xs-12">
                            <h1>Sign Up</h1>
                            <p>Register for an account to start uploading your art right away!</p>
                            <?php 
                                if ($vm != null) {
                                    if ($vm->errorMsg != '') { ?>
                                        <p> <?php echo $vm->errorMsg; ?></p>
                                    <?php }
                            }?>
                            <form action="." method="post" id="register_user">
                                <input type="hidden" name="ctlr" value="admin" />
                                <input type="hidden" name="action" value="register" />
                                    <?php echo csrf_token_tag(); ?>
                                <div class="con-item col-xs-12">
                                    <label>First Name</label>
                                    <input type="text" name="firstName" aria-required="true">
                                </div>
                                <div class="con-item col-xs-12">
                                    <label>Last Name</label>
                                    <input type="text" name="lastName" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>Email</label>
                                    <input type="text" name="email" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>Phone</label>
                                    <input type="text" name="phone" placeholder="format number as ###-###-####" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>Password</label>
                                    <input type="password" name="password" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirmPassword" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>&nbsp;</label>
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i> Sign Up
                                    </button>
                                </div>
                                <!-- end con-item -->
                            </form>
                        </div>
                        
                        </div>
                        <!-- end contact-details -->
                    </div>
                    <!-- end contact-data -->
                </div>
                <!-- end container -->
            </section>
            <!-- end contact-box -->
            
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
    <!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
    <script src="js/jquery.countTo.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    
    <?php require('artHubFooter.php');