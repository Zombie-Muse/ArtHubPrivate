<?php
// All files that need to be included by the GuitarShop application
// @author Gary McCormack
// @version 1

// Includes common to other artHub applications
include_once(NON_WEB_BASE_DIR . 'common/includes/artHubCommonIncludes.php');

// Includes specific to this application.
include_once(APP_NON_WEB_BASE_DIR .'includes/deployment.php');
//include_once(APP_NON_WEB_BASE_DIR .'includes/whitelist.php');
include_once(APP_NON_WEB_BASE_DIR .'includes/whitelistAchtung.php');
include_once(APP_NON_WEB_BASE_DIR .'includes/tagFunctions.php');
include_once(APP_NON_WEB_BASE_DIR .'controllers/DefaultController.php');
include_once(APP_NON_WEB_BASE_DIR .'controllers/HomeController.php');
include_once(APP_NON_WEB_BASE_DIR .'controllers/CartController.php');
include_once(APP_NON_WEB_BASE_DIR .'controllers/AdminController.php');
include_once(APP_NON_WEB_BASE_DIR .'models/Category.php');
include_once(APP_NON_WEB_BASE_DIR .'models/Product.php');
//include_once(APP_NON_WEB_BASE_DIR .'db/CategoryDAM.php');
include_once(APP_NON_WEB_BASE_DIR .'db/CategoryDAMAchtung.php');
//include_once(APP_NON_WEB_BASE_DIR .'db/ProductDAM.php');
include_once(APP_NON_WEB_BASE_DIR .'db/ProductDAMAchtung.php');
include_once(APP_NON_WEB_BASE_DIR .'viewModels/Page.php');
include_once(APP_NON_WEB_BASE_DIR .'viewModels/MessageVM.php');
//include_once(APP_NON_WEB_BASE_DIR .'viewModels/ProductsVM.php');
include_once(APP_NON_WEB_BASE_DIR .'viewModels/ProductsVMAchtung.php');