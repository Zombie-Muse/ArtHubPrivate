<?php

/**
 * Superclass for all DAM classes in this application
 *
 * @author jam
 * @version 170709
 */
class DAM {
    
    protected $db;

    function __construct() {
        $this->db = DBAccess::getInstance()->getConnection();
    }
}
