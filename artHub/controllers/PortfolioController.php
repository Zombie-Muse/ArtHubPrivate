<?php

/**
 * Controller that handles portfolio views and upload
 *
 * @author Gary McCormack
 * @version 201128
 */
class PortfolioController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    public function viewPortfolio() {
        Page::$title = 'ArtHub - Portfolio';
        require(APP_NON_WEB_BASE_DIR .'views/portfolio.php');
        console.log("portfolio");
    }

    public function uploadArt() {
        Page::$title = 'ArtHub - Upload';
        require(APP_NON_WEB_BASE_DIR . 'views/upload.php');
    }
}