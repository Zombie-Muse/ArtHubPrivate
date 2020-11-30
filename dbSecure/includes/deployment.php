<?php

/**
 * Contains deployment constants for the dbSecure application.
 * 
 * @author jam
 * @version 180426
 */

// Access files base directory
define ('ACCESS_BASE_DIR', APP_NON_WEB_BASE_DIR . 'access/');

// Database access credentials location
define ('DB_ACCESS_CREDENTIALS_FILE', ACCESS_BASE_DIR . 'dbAccess.csv');

// Website domain complete with protocol and terminated with a slash
define ('SITE_DOMAIN', 'http://localhost/cis4270/finalProject/');

// Page to display when session is invalid
define ('INVALID_SESSION_PAGE', 'views/invalidForm.php');

// Browser tab text for invalid session page
define ('INVALID_SESSION_PAGE_TITLE', 'Restricted');
