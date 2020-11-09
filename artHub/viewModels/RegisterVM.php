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
    // public $message;
    // public $error = array();
    
    // User type constants used for switching in the controller.
    const VALID_REGISTRATION = 'valid_registration';
    const INVALID_REGISTRATION = 'invalid_registration';
    
    public function __construct() {
        $this->userDAM = new UserDAM();
        $this->errorMsg = '';
        $this->statusMsg = array();
        $this->enteredPW = '';
        $this->enteredConfPW = '';
        $this->registrationType = self::INVALID_REGISTRATION;
        $this->newUser = null;
        // $this->printError($this->error);
    }

    public static function getInstance() {
        $vm = new self();
        
        $varArray = array('id' => emailPost('email'),
            'lastName' => hPOST('lastName'),
            'firstName' => hPOST('firstName'),
			'phone' => hPOST('phone'));
        $vm->newUser = new User($varArray);
        $vm->enteredPW = hPOST('password');
        $vm->enteredConfPW = hPOST('confirmPassword');
        if ($vm->validateUserInput()) {
            $vm->newUser->password = password_hash($vm->enteredPW, PASSWORD_DEFAULT);
            $vm->userDAM->writeUser($vm->newUser);
            $vm->registrationType = self::VALID_REGISTRATION;
        }
        return $vm;
    }
      
    public function validateUserInput() {
        $success = false;

        if ($this->newUser->lastName == null) {
            $this->errorMsg = "Please enter your last name.";
        } else if ($this->newUser->firstName == null) {
            $this->errorMsg = "Please enter your first name.";
        } else if ($this->newUser->id == null) {
            $this->errorMsg = "Please enter a valid email address.";
        } else if ($this->userDAM->readUser($this->newUser->id) != null) {
            $this->errorMsg = "This user already exists.";
        } else if ($this->enteredPW == null) {
            $this->errorMsg = "Please enter a password.";
        } else if ($this->enteredConfPW == null) {
            $this->errorMsg = "Please confirm your password.";
        } else if ($this->enteredConfPW != $this->enteredPW) {
            $this->errorMsg = "Your passwords do not match";
        } else {
            $success = true;
        }
        return $success;
    }
}