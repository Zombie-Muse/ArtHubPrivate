<?php require('artHubHeader.php'); ?>

        <div class="mask-inner col-xs-12">
            <section class="presso-header col-xs-12" data-background="https://www.placecage.com/c/500/500">
                
                <div class="presso-nav top-section col-xs-12">
                    <h1>Sign In</h1>
                    <p>or</p>
                    <ul>
                        <li>
                            <a class="active">Sign In</a>
                        </li>
                        <li><span>/</span></li>
                        <li>
                            <a href="?ctlr=admin&amp;action=register">Register</a>
                        </li>
                    </ul>
                    <b>
                        <i class="fa fa-angle-double-down"></i>
                    </b>
                </div>
            </section>
            <!-- edn presso-header -->
            <section class="contact-box top-section col-xs-12">
                <div class="container">
                    <div class="contact-data col-xs-12">
                        <div class="contact-form col-md-8 col-xs-12">
                            <h1>Sign In</h1>
                            <p>Login to your existing account</p>
                            <form action="." method="post" id="login_user">
                                <input type="hidden" name="ctlr" value="admin" />
                                <input type="hidden" name="action" value="login" />
                                    <?php echo csrf_token_tag(); ?>
                                <div class="con-item col-xs-12">
                                    <label>Email</label>
                                    <input type="text" name="username" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>Password</label>
                                    <input type="password" name="password" aria-required="true">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>&nbsp;</label>
                                    <button type="submit" class="btn btn-outline-dark btn-lg">
                                        <!--<i class="btn btn-outline-dark btn-lg"></i>--> Sign In
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
    <script src="js/jquery.countTo.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>

    <?php require('artHubFooter.php');