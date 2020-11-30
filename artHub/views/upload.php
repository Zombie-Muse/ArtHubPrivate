<?php before_every_protected_page();
require('artHubAdminHeader.php'); 
      
?>

    <div class="main-wrapper col-xs-12">
        
        <div class="mask-inner col-xs-12">
            <section class="presso-header col-xs-12" data-background="images/section-bj/section-bj.jpg">
                
                <!-- end main-header -->
                <div class="presso-nav top-section col-xs-12">
                    <h1>Upload Content</h1>
                    <ul>
                        <li>
                            <a href="?ctlr=admin&amp;action=home">home</a>
                        </li>
                        <li><span>/</span></li>
                        <li>
                            <a class="active">Upload</a>
                        </li>
                    </ul>
                    <b class="brown">
                        <i class="fa fa-angle-double-down"></i>
                    </b>
                </div>
                <!-- end presso-nav -->
                <!-- end main-header -->
            </section>
            <!-- edn presso-header -->
            <section class="single-container  col-xs-12">
                <div class="single-box top-section col-xs-12">
                    <div class="container">
                        <div class="single-slider col-md-8 col-xs-12">
                        <form action="." method="post" id="upload" enctype="multipart/form-data">
                                <input type="hidden" name="ctlr" value="admin" />
                                <input type="hidden" name="action" value="addProduct" />
                                    <?php echo csrf_token_tag(); ?>
                                <div class="con-item col-xs-12">
                                    <label>Title</label>
                                    <input type="text" name="title" aria-required="true">
                                </div>
                                <div class="con-item col-xs-12">
                                    <label>Medium</label>
                                    <input type="text" name="medium" aria-required="true">
                                </div>
                                <div class="con-item col-xs-12">
                                    <label>Dimensions</label>
                                    <input type="text" name="dimensions" aria-required="false">
                                </div>
                                <!-- end con-item -->
                                <div class="con-item col-xs-12">
                                    <label>Description</label>
                                    <textarea name="description" rows="4" cols="60" aria-required="false"></textarea>
                                </div>
                                <!-- end con-item -->
                                <div class="form-group">
                                    <label for="uploadFile"><i>*File cannot be larger than 10MB*</i></label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>">
                                    <input type="file" name="artwork" class="form-control-file" id="uploadFile">
                                </div>
                                <div class="con-item col-xs-12">
                                    <label></label>
                                    <button type="submit">
                                        <i class="fa fa-paper-plane"></i> Submit
                                    </button>
                                </div>

                                <!-- end con-item -->
                            </form>
                            <!-- end single-portfolio-slider -->
                        </div>
                        <!-- end single-slider -->
                        <div class="single-data col-md-4 col-xs-12">
                            <div class="single-data-descr col-xs-12">
                            <h3>Additional Information</h3>
                            <p>Enter all the information you can. People want to know details. The rcommended format is: </br></br>
                            
                                "Example Title"</br>
                                "Example oils on canvas"</br>
                                "Description of the wonderful art you have created. You can also enter the dimensions and whatever other information that is relevant."

                            </p>
                            </div>
                            <!-- end single-data-descr -->
                        </div>
                        <!-- end single-data -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end single-box -->
                <div class="single-latest top-section col-xs-12">
                    <div class="container">
                    <?php
                                  echo "<hr />";
                                  var_dump($_FILES);
                                  echo "<hr />";

                                  upload_file('artwork');
                                  display_photo('artwork');
                                ?>
                        <div class="single-latest-head col-xs-12">
                            <h1 class="head-center">Other art you have uploaded</h1>
                        </div>
                        <!-- end single-latest-head -->
                        <div class="single-latest-body gallery col-xs-12">
                            <div class="gallery-container col-xs-12">
                                <ul>
                                    <li>
                                        <div class="mix col-lg-3 col-md-3 col-sm-6 col-xs-12 websites">
                                            <img src="images/gallery-section/gallery.jpg" alt="gallery-item-img">
                                            <div class="gallery-item-caption col-xs-12">
                                                <div class="open-mag">
                                                    <a href="images/gallery-section/gallery.jpg" rel="prettyPhoto[pp_gal]">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <!-- end open-mag -->
                                                <div class="item-name">
                                                    <a href="#">item name</a>
                                                </div>
                                                <!-- end item-name -->
                                                <div class="item-tags">
                                                    <a href="#">creative</a> |
                                                    <a href="#">branding</a>
                                                </div>
                                                <!-- end item-tags -->
                                            </div>
                                            <!-- end gallery-item-caption -->
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mix col-lg-3 col-md-3 col-sm-6 col-xs-12 identity">
                                            <img src="images/gallery-section/gallery.jpg" alt="gallery-item-img">
                                            <div class="gallery-item-caption col-xs-12">
                                                <div class="open-mag">
                                                    <a href="images/gallery-section/gallery.jpg" rel="prettyPhoto[pp_gal]">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <!-- end open-mag -->
                                                <div class="item-name">
                                                    <a href="#">item name</a>
                                                </div>
                                                <!-- end item-name -->
                                                <div class="item-tags">
                                                    <a href="#">creative</a> |
                                                    <a href="#">branding</a>
                                                </div>
                                                <!-- end item-tags -->
                                            </div>
                                            <!-- end gallery-item-caption -->

                                        </div>
                                    </li>
                                    <li>
                                        <div class="mix col-lg-3 col-md-3 col-sm-6 col-xs-12 logotypes">
                                            <img src="images/gallery-section/gallery.jpg" alt="gallery-item-img">
                                            <div class="gallery-item-caption col-xs-12">
                                                <div class="open-mag">
                                                    <a href="images/gallery-section/gallery.jpg" rel="prettyPhoto[pp_gal]">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <!-- end open-mag -->
                                                <div class="item-name">
                                                    <a href="#">item name</a>
                                                </div>
                                                <!-- end item-name -->
                                                <div class="item-tags">
                                                    <a href="#">creative</a> |
                                                    <a href="#">branding</a>
                                                </div>
                                                <!-- end item-tags -->
                                            </div>
                                            <!-- end gallery-item-caption -->

                                        </div>
                                    </li>
                                    <li>
                                        <div class="mix col-lg-3 col-md-3 col-sm-6 col-xs-12 websites">
                                            <img src="images/gallery-section/gallery.jpg" alt="gallery-item-img">
                                            <div class="gallery-item-caption col-xs-12">
                                                <div class="open-mag">
                                                    <a href="images/gallery-section/gallery.jpg" rel="prettyPhoto[pp_gal]">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <!-- end open-mag -->
                                                <div class="item-name">
                                                    <a href="#">item name</a>
                                                </div>
                                                <!-- end item-name -->
                                                <div class="item-tags">
                                                    <a href="#">creative</a> |
                                                    <a href="#">branding</a>
                                                </div>
                                                <!-- end item-tags -->
                                            </div>
                                            <!-- end gallery-item-caption -->

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- end gallery-container -->
                        </div>
                        <!-- end single-latest-body -->
                    </div>
                    <!-- end container -->
                </div>
                <!-- end single-latest -->
            </section>
            <!-- end single-container -->
            <section class="purchase-item col-xs-12">
                <div class="container">
                    <p>
                        <b class="fa fa-thumbs-o-up"></b>
                        <span>Unlimited possibilities with presso Creative Agency</span>
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