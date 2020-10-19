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
            'l_Name' => hPOST('l_Name'),
            'f_Name' => hPOST('f_Name'),
			'phoneNumber' => hPOST('phoneNumber'));
        $vm->newUser = new User($varArray);
        $vm->enteredPW = hPOST('password');
        $vm->enteredConfPW = hPOST('confirmPassword');
        if ($vm->validateUserInput()) {
            $vm->registrationType = self::VALID_REGISTRATION;
        }
        return $vm;
    }
      
    private function validateUserInput() {
        $success = false;
		
        // Add validation code here.
        // If all validation tests pass, set $success = true.
        // if($varArray['l_Name'] != null);
        //     $success = true;
        // if($enteredPW === $enteredConfPW) {
        //     $success = true;
        //     $vm->registrationType = self::VALID_REGISTRATION;
        // }
        // else{
        //     $vm->registrationType = self::INVALID_REGISTRATION;
        //     $success = false;
        // }
        return $success;
    }

}