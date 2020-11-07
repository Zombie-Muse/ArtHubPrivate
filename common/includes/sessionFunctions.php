<?php
// Session control functions
// @author jam
// @version 181117

// Useful php.ini file settings:
// session.cookie_lifetime = 0
// session.cookie_secure = 1
// session.cookie_httponly = 1
// session.use_only_cookies = 1

// session_start();

// Function to forcibly end the session
function end_session() {
    
    // Use both for compatibility with all browsers
    // and all versions of PHP.
    // Unset the session variables
    $_SESSION = array();
    
    // Destroy the session if active
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
    }
}

// Does the request IP match the stored value?
function request_ip_matches_session() {
    
    // return false if either value is not set
    if (!isset($_SESSION['ip']) || null !== hServerParameter('REMOTE_ADDR')) {
        return false;
    }
    if ($_SESSION['ip'] === hServerParameter('REMOTE_ADDR')) {
        return true;
    } else {
        return false;
    }
}

// Does the request user agent match the stored value?
function request_user_agent_matches_session() {
    
    // return false if either value is not set
    if (!isset($_SESSION['user_agent']) || null !== hServerParameter('HTTP_USER_AGENT')) {
        return false;
    }
    if ($_SESSION['user_agent'] === hServerParameter('HTTP_USER_AGENT')) {
        return true;
    } else {
        return false;
    }
}

// Has too much time passed since the last login?
function last_login_is_recent() {
    //$max_elapsed = 60 * 60 * 24; // 1 day
    $max_elapsed = 60 * 1; // 1 minute

    // return false if value is not set
    if (!isset($_SESSION['last_login'])) {
        return false;
    }
    if (($_SESSION['last_login'] + $max_elapsed) >= time()) {
        return true;
    } else {
        return false;
    }
}

// Should the session be considered valid?
function is_session_valid() {
    
    // Set false when using localhost
    $check_ip = false;
    
    // Set false when using localhost
    $check_user_agent = false;
    $check_last_login = true;

    if ($check_ip && !request_ip_matches_session()) {
        //var_dump('failed in checing session IP');
        return false;
    }
    if ($check_user_agent && !request_user_agent_matches_session()) {
        //var_dump('failed in checing user agent');
        return false;
    }
    if ($check_last_login && !last_login_is_recent()) {
        //var_dump('failed in checing last login');
        return false;
    }
    return true;
}

// If session is not valid, end and redirect to login or home page.
function confirm_session_is_valid() {
    if (!is_session_valid()) {
        end_session();
        goToInvalidSessionPage();
    }
}

// Is user logged in already?
function is_logged_in() {
    return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']);
}

// If user is not logged in, end and redirect to login or home page.
function confirm_user_logged_in() {
    if (!is_logged_in()) {
        end_session();
        goToInvalidSessionPage();
    }
}


// Actions to preform after every successful login
function after_successful_login() {
    
    // Regenerate session ID to invalidate the old one.
    // Super important to prevent session hijacking/fixation.
    session_regenerate_id();

    $_SESSION['logged_in'] = true;

    // Save these values in the session, even when checks aren't enabled 
    $_SESSION['ip'] = hServerParameter('REMOTE_ADDR');
    $_SESSION['user_agent'] = hServerParameter('HTTP_USER_AGENT');
    $_SESSION['last_login'] = time();
}

// Actions to preform after every successful logout
function after_successful_logout() {
    $_SESSION['logged_in'] = false;
    end_session();
}

// Actions to preform before giving access to any 
// access-restricted page.
function before_every_protected_page() {
    confirm_user_logged_in();
    confirm_session_is_valid();
}

// Redirect to the page used for invalid sessions and exit the script
// (typically the home or login page).
function goToInvalidSessionPage() {
    
    // Note that header redirection requires output buffering 
    // to be turned on or requires nothing has been output 
    // (not even whitespace).

//    header('Location: ' . SITE_DOMAIN . 'index.php');
//    $vm = null;
    Page::$title = INVALID_SESSION_PAGE_TITLE;
    require(APP_NON_WEB_BASE_DIR . INVALID_SESSION_PAGE);
    exit;
}

