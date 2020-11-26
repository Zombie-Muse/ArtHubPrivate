<?php

/**
 * Controller that handles gallery views
 *
 * @author Gary McCormack
 * @version 201125
 */
class GalleryController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    public function viewGallery() {
        Page::$title = 'ArtHub - Gallery';
        require(APP_NON_WEB_BASE_DIR .'views/gallery.php');
    }
}