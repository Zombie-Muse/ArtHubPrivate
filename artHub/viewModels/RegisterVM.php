<?php

/**
 * View model for user registration functions.
 *
 * @author jam
 * @version 201018
 */
class RegisterVM {

    public $enteredPW;
    public $enteredConfPW;
    public $registrationType;
    public $errorMsg;
    public $statusMsg;
    public $newUser;
    
    // User type constants used for switching in the controller.
    const VALID_REGISTRATION = 'valid_registration';
    const INVALID_REGISTRATION = 'invalid_registration';
    
    public function __construct() {
        $this->errorMsg = '';
        $this->statusMsg = array();
        $this->enteredPW = '';
        $this->enteredConfPW = '';
        $this->registrationType = self::INVALID_REGISTRATION;
        $this->newUser = null;
    }

    public static function getInstance() {
        $vm = new self();
        
        $varArray = array('id' => emailPost('email'),
            'l_name' => hPOST('l_name'),
            'f_name' => hPOST('f_name'),
			'phone' => hPOST('phone'));
        $vm->newUser = new User($varArray);
        $vm->enteredPW = hPOST('password');
        $vm->enteredConfPW = hPOST('confirmPassword');
        if ($vm->validateUserInput($varArray, $vm->enteredPW, $vm->enteredConfPW)) {
            $vm->registrationType = self::VALID_REGISTRATION;
        }
        return $vm;
    }
      
    public function validateUserInput($varArray, $enteredPW, $enteredConfPW) {
        $success = false;
		
        // Add validation code here.
        // If all validation tests pass, set $success = true.

        // test first name
        if($varArray['f_name'] == null) {
            $statusMsg['f_name'] = "You must enter a first name.";
        }
        // test last name
        if($varArray['l_name'] == null) {
            $statusMsg['l_name'] = "You must enter a last name.";
        }
        // test email
        if($varArray['id'] == null) {
            $statusMsg['email'] = "You must enter a valid email.";
        }
        // test phone number
        if($varArray['phone'] == null) {
            $statusMsg['phone'] = "You must enter a alid phone number.";
        }
        // test password
        if($enteredPW == null || $enteredConfPW == null) {
            $statusMsg[$enteredPW] = "You must enter a password";
        }

        return $success;
    }

    public function displayError() {
        $errorMsg = "Please fix the following errors: " . $statusMsg;
        return $errorMsg;
    }

}