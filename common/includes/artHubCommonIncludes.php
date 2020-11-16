<?php
// All files that need to be included by all the ArtHub applications.
// @author jam
// @version 201018

include_once(NON_WEB_BASE_DIR .'common/includes/validationFunctions.php');
include_once(NON_WEB_BASE_DIR .'common/includes/sanitizationFunctions.php');
include_once(NON_WEB_BASE_DIR .'common/includes/csrf_token_functions.php');
include_once(NON_WEB_BASE_DIR .'common/includes/passwordGen.php');
include_once(NON_WEB_BASE_DIR .'common/includes/sessionFunctions.php');

include_once(NON_WEB_BASE_DIR .'common/db/DBAccess.php');
// include_once(NON_WEB_BASE_DIR .'common/db/DBAccessAchtung.php');
include_once(NON_WEB_BASE_DIR .'common/db/DAM.php');



