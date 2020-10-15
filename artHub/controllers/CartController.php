<?php

/**
 * Controller that handles shopping cart functions of the ArtHub app.
 *
 * @author Gary McCormack
 * @version 1
 */
class CartController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    public function add() {
        Page::$title = 'ArtHub - Cart';
        require(APP_NON_WEB_BASE_DIR .'views/shoppingCart.php');
    }
}
