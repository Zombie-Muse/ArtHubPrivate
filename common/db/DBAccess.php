<?php

/**
 * DB Access for web applications.
 * PDO access to MySQL; only one connection is allowed (using the singleton
 * pattern). Database access credentials are obtained from a CSV file.
 * 
 * @author jam
 * @version 180504
 */
class DBAccess {

    private $connection;
    
    // Store the single instance.
    private static $instance;

    /**
     * Get an instance of the DBAccess class if one has not yet been obtained.
     * @return DBAccess 
     */
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor creates a connection to the database.
     */
    public function __construct() {
        try {
            $dbCreds = self::getDBCredentials();
            $this->connection = new PDO($dbCreds[0], $dbCreds[2], $dbCreds[3]);

            // Set the following attribute to run MySQL prepared statements in
            // native mode. Otherwise, prepared statements are emulated and 
            // the risk if SQL injection is greater.
            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            // Set the following attribute to have MySQL return proper data types.
            // Otherwise all queries will return strings - even for numbers.
            $this->connection->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include(NON_WEB_BASE_DIR . 'views/databaseError.php');
            exit();
        }
    }
    
    /**
     * Empty clone magic method to prevent duplication - only want one instance
     * of this class avaliable to the application. 
     */
    private function __clone() {
        
    }

    /**
     * Get the PDO MySQL connection. 
     */
    public function getConnection() {
        return $this->connection;
    }

    /**
     * Destroys the PDO connection object reference in this object. All PDO
     * connection references must be destroyed before the connection is
     * actually closed.
     */
    public static function close() {
        
        // Closes the connection by destroying the database object. Setting the
        // database object variable to null destroys it. However,
        // all pointers to the object must be null before the connection is
        // closed.
        $this->connection = null;
    }
    
    private static function getDBCredentials() {
        $dbAccessFilePath = DB_ACCESS_CREDENTIALS_FILE;
        $dbAccessFile = fopen($dbAccessFilePath, 'rt');
        $dbAccessParams = fgetcsv($dbAccessFile, 0, ",");
        fclose($dbAccessFile);
        return $dbAccessParams;
    }

}
