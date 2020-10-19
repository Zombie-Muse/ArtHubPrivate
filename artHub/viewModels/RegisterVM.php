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
        if ($vm->validateUserInput()) {
            $vm->registrationType = self::VALID_REGISTRATION;
        }
        return $vm;
    }
      
    public function validateUserInput() {
        $success = false;
		
        // Add validation code here.
        // If all validation tests pass, set $success = true.

        //UNIQUE
	    //If the inputted Email doesn't exist then it will return a null value
	    $ent_Email = emailPost('email');

	    //setup variables
	    $ent_FName = hPOST('f_name');
	    $ent_LName = hPOST('l_name');
	    $ent_Phone = hPOST('phone');
	    $ent_Password = hPOST('password');
        $ent_ConfirmPassword = hPOST('confirmPassword');
        $statusMsg = array (); 
	
	    //MY UNIQUE VARIABLE
        // $checkSuccess = 0;
	
	    //Check if Email exist
	    if (!hasPresence($ent_Email)){
		    $statusMsg['error 1: '] = "Please enter email. <br />";
	    } 

	    //Checks if First Name exist
	    if (!hasPresence($ent_FName)){
            // $checkSuccess += 1;
            $statusMsg['error 2: '] = "Please enter your first name. <br />";
	    }

	    //Checks if Last Name exist
	    if (!hasPresence($ent_LName)){
            // $checkSuccess += 1;
            $statusMsg['error 3: '] = "Please enter your last name. <br />";
        }

	    //Checks if Phone Number exist
	    if (hasPresence($ent_Phone)){
		    if (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $ent_Phone)){
			    $statusMsg['error 4: '] = "Please enter a valid phone number. <br />";
		    } 
        } 
        else {
		    $statusMsg['error 4a '] = "Phone Number is empty! </br>";
	    }

	    //Checks Password and Confirm Password exists
	    if (hasPresence($ent_Password) && hasPresence($ent_ConfirmPassword)){

		    //Checks if Password matches Confirm Password
		    if ($ent_Password !== $ent_ConfirmPassword) {
                $statusMsg['Error 5: '] = "Your passwords do not match! </br>";
            }
        } 
        else {
		    $statusMsg['error 6: '] = "Please enter password and confirm password. <br />";
	    }

	    //check if there are any errors
	    if ($statusMsg == null){
            $success = true;
        }
        else {
            echo implode($statusMsg);
        }
    
        return $statusMsg;
    }
}