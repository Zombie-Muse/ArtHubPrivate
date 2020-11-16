<?php

/**
 * View model for login functions.
 *
 * @author jam
 * @version 181117
 */
class LoginVM {

    public $enteredUserId;
    public $enteredPassword;
    public $userType;
    public $errorMsg;
    public $statusMsg;
    
    // User type constants used for switching in the controller.
    const VALID_LOGIN = 'valid_login';
    const INVALID_LOGIN = 'invalid_login';
    
    public function __construct() {
        $this->userDAM = new UserDAM();
        $this->errorMsg = '';
        $this->statusMsg = array();
        $this->enteredUserId = '';
        $this->enteredPassword = '';
    }

    public static function getInstance() {
        $vm = new self();
        $vm->enteredUserId = hPOST('username');
        $vm->enteredPassword = hPOST('password');
        $user = $vm->userDAM->readUser($vm->enteredUserId);
        if ($vm->authenticateUser($user)) {
            $vm->userType = self::VALID_LOGIN;
            // clear_failed_logins($user);
            session_start();
            after_successful_login();
            $_SESSION ['userName'] = $user->firstName . ' ' . $user->lastName;
            $_SESSION ['userId'] = $vm->enteredUserId;
        } else {
             $vm->userType = self::INVALID_LOGIN;
            //  record_failed_login($user);
        }
        return $vm;
    }
    
    private function authenticateUser($user) {
        $userFound = true;
        if ($user === null) {
            $userFound = false;
        }
        return $userFound &&
            password_verify($this->enteredPassword, $user->password);
    }

}
