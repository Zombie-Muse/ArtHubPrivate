<?php

/**
 * failed attempts model data access and manipulation (DAM) class.
 *
 * @author ZomB
 * @version 091120
 */

 class failDAM extends DAM {

    // Database connection is inherited from the parent.
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Read the User object from the database with the specified ID
     * @param type $userId the user's unique user ID (probably email)
     * @return \User the resulting User object - null if user is
     * not in the database.
     */
    public function readFailUser($userId) {
        $query = 'SELECT * FROM fail
              WHERE userID = :userID';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':userID', $userId);
        $statement->execute();
        $failDB = $statement->fetch();
        $statement->closeCursor();
        if ($failDB == null) {
            return null;
        } else {
            return $failDB;
        }
    }

    /**
     * Write the specified user to the database. If the user is not
     * in the database, the object is added. If the user is already in the
     * database, the object is updated (excluding password).
     * @param type $user the User object to be written.
     */
    public function writeFailUser($user, $count, $lastTime) {
        
        // Check to see if the user is already in the database.
        $query = 'SELECT userID FROM users
              WHERE userID = :userID';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':userID', $user->id);
        $statement->execute();
        $userDB = $statement->fetch();
        $statement->closeCursor();
        if ($userDB == null) {

            //add a new failed attempt to the database
            $query = 'INSERT INTO fail (userID, count, lastTime)
                        VALUES (:userID, :count, :lastTime)';

            $statement = $this->db->prepare($query);
            $statement->bindValue(':userID', $user->id);
            $statement->bindValue(':count', $count);
            $statement->bindValue(':lastTime', $lastTime);
            $statement->execute();
            $statement->closeCursor();
        } else {

            //update existing failed attempt
            $query = 'UPDATE fail
                    SET count = ?, lastTime = ?
                    WHERE userID = ?';
            $statement = $this->db->prepare($query);
            $statement->bindValue(1, $count, PDO::PARAM_INT);
            $statement->bindValue(2, $time, PDO::PARAM_INT);
            $statement->bindValue(3, $user, PDO::PARAM_STR);
            $statement->execute();
            $statement->closeCursor();
        }
    }
 } 