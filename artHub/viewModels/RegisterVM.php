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
    public $message;
    public $error = array();
    
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
        $this->printError($this->error);
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
        if ($vm->validateUserInput()) {
            $vm->registrationType = self::VALID_REGISTRATION;
        }
        return $vm;
    }
      
    public function validateUserInput() {
        $success = false;
        
		
        // Add validation code here.
        // If all validation tests pass, set $success = true.

        if($this->newUser->f_name != null) {
            // $error[] = $this->errorMsg;
        }
            else{
            $this->errorMsg = "Please enter your first name.:";
            $this->error[] = $this->errorMsg;

        }
        if($this->newUser->l_name != null) {
            // $error[] = $this->errorMsg;
        }
            else {
            $this->errorMsg = "Please enter your last name.:";
            $this->error[] = $this->errorMsg;

        }
        if($this->newUser->id != null) {
            // $error[] = $this->errorMsg;
        }
            else {
            $this->errorMsg = "Please enter a valid email address.:";
            $this->error[] = $this->errorMsg;
        }
        if(preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->newUser->phone)) {
            // $error[] = $this->errorMsg;
        }
            else {
            $this->errorMsg = "Please enter phone number in the following format: ###-###-####:";
            $this->error[] = $this->errorMsg;
        }
        if($this->enteredPW != null) {
            // $error[] = $this->errorMsg;
        }
            else {
            $this->errorMsg = "A password is required.:";
            $this->error[] = $this->errorMsg;
        }
        if($this->enteredConfPW != null) {
            // $error[] = $this->errorMsg;
        }
            else {
            $this->errorMsg = "Please confirm your password.:";
            $this->error[] = $this->errorMsg;
        }
        if($this->enteredPW != $this->enteredConfPW){
            $this->errorMsg = "Your passwords do not match.:";
            $this->error[] = $this->errorMsg;
        }
        if($this->error == null){
            $success = true;
        }
        // print_r($this->error);
        // $this->printError($this->error);
        return $success;
    }

    public function printError($error) {
        foreach($this->error as $message)
            echo $message . "<br />";
        return $this->message;
    }
    
}