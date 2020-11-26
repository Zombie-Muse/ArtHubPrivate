<?php

/**
 * Controller that handles administrator functions of the ArtHub
 * application.
 *
 * @author jam
 * @version 201018
 */
class AdminController extends DefaultController {

    protected $model = null;

    public function __construct() {
        parent::__construct();
    }

    public function loginGET() {
        Page::$title = 'ArtHub - Login';
        require(APP_NON_WEB_BASE_DIR . 'views/login.php');
    }

    public function loginPOST() {
        $userID = hPOST('username');
            after_successful_logout();
            $vm = LoginVM::getInstance();
            if ($vm->userType === LoginVM::VALID_LOGIN) {
                $this->loginSuccess();
            } else {
                Page::$title = 'Invalid Credentials';
                require(APP_NON_WEB_BASE_DIR .'views/loginFailed.php');
        }
    }

    public function loginSuccess() {
        $vm = ProductsVM::getCategoryInstance();
        Page::$title = 'Product Mgr - ' . $vm->category->name;
        require(APP_NON_WEB_BASE_DIR . 'views/loginSuccess.php');
    }

    public function logout() {
        after_successful_logout();
        require(APP_NON_WEB_BASE_DIR .'views/cycleTracks.php');
    }

    public function registerGET() {
        $vm = null;
        Page::$title = 'ArtHub - Register';
        require(APP_NON_WEB_BASE_DIR . 'views/register.php');
    }

    public function registerPOST() {
        $vm = RegisterVM::getInstance();
        if ($vm->registrationType === RegisterVM::VALID_REGISTRATION) {
            Page::$title = 'Valid Registration';
            require(APP_NON_WEB_BASE_DIR .'views/registrationSuccess.php');
        } else {
            Page::$title = 'Invalid Registration';
            require(APP_NON_WEB_BASE_DIR .'views/registrationErrors.php');
        }
    }

    public function listProducts() {
        $vm = ProductsVM::getCategoryInstance();
        Page::$title = 'Product Mgr - ' . $vm->category->name;
        require(APP_NON_WEB_BASE_DIR . 'views/cycleTracks.php');
    }

    public function viewProduct() {
        $vm = ProductsVM::getProductInstance();
        Page::$title = 'Product Mgr - ' . $vm->product->name;
        require(APP_NON_WEB_BASE_DIR . 'views/adminProductView.php');
    }

    public function deleteProduct() {
        $vmDelete = ProductsVM::getDeleteInstance();
        $vm = ProductsVM::getCategoryInstance($vmDelete->category->id);
        Page::$title = 'Product Mgr - ' . $vm->category->name;
        require(APP_NON_WEB_BASE_DIR . 'views/adminProductList.php');
    }
    
    public function showAddProduct() {                                      //Change to reflect upload page
        Page::$title = 'Admin - Upload';
        require(APP_NON_WEB_BASE_DIR . 'views/upload.php');
    }
    
    public function addEditProduct() {
        $vmAdd = ProductsVM::getAddEditInstance();
        $vm = ProductsVM::getCategoryInstance($vmAdd->category->id);
        Page::$title = 'Product Mgr - ' . $vm->category->name;
        require(APP_NON_WEB_BASE_DIR . 'views/adminProductList.php');
    }
    
    public function showEditProduct() {
        $vm = ProductsVM::getEditProductInstance();
        Page::$title = 'Product Mgr - Edit ' . $vm->product->name;
        require(APP_NON_WEB_BASE_DIR . 'views/editProduct.php');
    }

    private function goToView($vm) {

        // if an error message exists, display the error.
        if ($vm->errorMsg != '') {
            $error = $vm->errorMsg;
            include(NON_WEB_BASE_DIR . 'views/error.php');
        } else {
            Page::$title = 'Admin Console';
            Page::$userName = $_SESSION ['userName'];
            Page::setNavLinks(array('admin profile', 'logout'));
            require(NON_WEB_BASE_DIR . 'views/adminMenu.php');
        }
    }
}
