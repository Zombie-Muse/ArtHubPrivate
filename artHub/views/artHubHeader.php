<!DOCTYPE html>


<html lang="en">

<head>
    <title><?php echo Page::$title; ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta name="author" content="Amir Nageh">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <!-- <link rel="shortcut icon" href="images/faveicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png"> -->

    <!-- Css Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="css/owl.theme.min.css" rel="stylesheet" type="text/css">
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- <link href="images/faveicon.png" rel="icon" type="text/css"> -->
</head>

<body>
<div class="presso-preloader">
    <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
  </div>
</div><!-- end presso-preloader -->
    <div class="main-wrapper col-xs-12">
        <div class="side-mobile-nav">
            <h2>
                <img src="images/ArtHubLogo1.png" alt="logo">
            </h2>
            <ul>
                <li>
                    <form action="#" method="get">
                        <input type="text" placeholder="Search here ..">
                    </form>
                </li>
                <li>
                    <a href="?ctlr=admin&amp;action=home">Home</a>
                </li>
                <li>
                    <a href="about.html">About Us</a>
                </li>
                <li>
                    <a href="?ctlr=gallery&amp;action=viewGallery">Gallery</a>
                </li>
                <li>
                    <a href="main-portfolio.html">portfolio</a>
                </li>
                <li>
                    <a href="shop.html">shop</a>
                </li>
                <li>
                    <a href="?ctlr=admin&amp;action=login">Login</a>
                </li>
                <li>
                    <a href="contact1.html">Contact</a>
                </li>
            </ul>
        </div>
        
        <!-- end side-mobile-nav -->
        <div class="mask-inner col-xs-12">
            <header class="main-header col-xs-12">
                <div class="container">
                    <div class="logo col-lg-3 col-md-3 col-xs-7">
                        <a href="?ctlr=admin&amp;action=home">
                            <img src="images/ArtHubLogo1.png" alt="logo">
                        </a>
                    </div>
                    <!-- end logo -->
                    <nav class="main-nav col-lg-7 col-md-7">
                        <ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Contact
                                <i class="fa fa-angle-down"></i>
                            </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="about.html">about us</a>
                                    </li>
                                    <li>
                                        <a href="contact1.html">Contact Us</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Gallery
                                <i class="fa fa-angle-down"></i>
                            </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="?ctlr=gallery&amp;action=viewGallery">Browse by Artist</a>
                                    </li>
                                    <li>
                                        <a href="?ctlr=gallery&amp;action=viewGallery">Browse by Title</a>
                                    </li>
                                    <li>
                                        <a href="?ctlr=gallery&amp;action=viewGallery">Browse by Subject</a>
                                    </li>
                                    <li>
                                        <a href="?ctlr=gallery&amp;action=viewGallery">Browse by Medium</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                shop
                                <i class="fa fa-angle-down"></i>
                            </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="shop.html">main shop</a>
                                    </li>
                                    <li>
                                        <a href="shop-single.html">shop single</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Login/Register
                                <i class="fa fa-angle-down"></i>
                            </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="?ctlr=admin&amp;action=login">Login</a>
                                    </li>
                                    <li>
                                        <a href="?ctlr=admin&amp;action=register">Register</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- end main-nav -->
                    <div class="nav-setting col-lg-2 col-md-2 col-xs-5">
                        <ul>
                            <li class="dropdown">
                                <a href="#">
                                    <i class="fa fa-shopping-bag"></i>
                                </a>
                                <ul class="dropdown-menu shop-dropdown">
                                    <li>
                                        <div class="media">
                                            <div class="media-avatar">
                                                <img class="shop-avatar" src="https://www.placecage.com/c/200/300" alt="shop-avatar" width="50" height="50">

                                            </div>
                                            <!-- end media-avatar -->
                                            <div class="media-body">

                                                <a href="#">Crazy Cage</a>
                                                <em>$40.00</em>
                                                <span title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </span>

                                            </div>
                                            <!-- end media-body -->
                                        </div>
                                        <!-- end media -->
                                    </li>
                                    <li>
                                        <div class="media">
                                            <div class="media-avatar">
                                                <img class="shop-avatar" src="https://www.placecage.com/g/200/300" alt="shop-avatar" width="50" height="50">

                                            </div>
                                            <!-- end media-avatar -->
                                            <div class="media-body">

                                                <a href="#">B&W Cage</a>
                                                <em>$40.00</em>
                                                <span title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </span>

                                            </div>
                                            <!-- end media-body -->
                                        </div>
                                        <!-- end media -->
                                    </li>
                                    <li>
                                        <div class="action">
                                            <a href="shop-cart.html">show cart</a>
                                        </div>
                                        <!-- end actions -->
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="open-search-box">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <a class="open-mobile-nav">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end nav-setting -->
                </div>
                <!-- end container -->
                <div class="search-container col-xs-12">
                    <div class="container">
                        <i class="fa fa-close close-search-box" title="Close"></i>
                        <div class="search-box">
                            <form action="#" method="get">
                                <input type="text" placeholder="Search ..">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- end search-box -->
                    </div>
                    <!-- end container -->
                    <canvas id="canvas">Canvas is not supported in your browser.</canvas>
                </div>
                <!-- end search-container -->
            </header>
    </div>
