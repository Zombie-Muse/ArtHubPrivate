<?php

/**
 * Page parameter class for the ArtHub application.
 * Contains values to be displayed on common layout areas of the application's
 * web pages.
 *
 * @author jam
 * @version 201018
 */
class Page {
    
    // The page tab title
    public static $title;
    
    // Array of nav nav links for the nav bar.
    public static $navLinks;

    // The name of the user
    public static $userName;
    
    // Associative arry of nav keys and link. This should include all possible
    // nav links used on the site.
    private static $navMap = array(
        'assignments' =>
            '<a href="index.php?ctlr=appraiser&action=showAssignment"'
            . 'title="View Assignments">View Apppraisal Assignments</a>',
        'admin menu' =>
        
//        '<form action="index.php" method="post">'
//        . '<input type="hidden" name="ctlr" value="admin">'
//        . '<input type="hidden" name="action" value="showMenu">'
//        . '<input id="appraisal-status-button" class="buttons" type="submit" value="Administrator Menu"></form>',
        
            '<a href="index.php?ctlr=admin&action=showMenu"'
            . 'title="View Assignments">Administrator Menu</a>',
        'contact' => '<a href="index.php?ctlr=login&action=contact" title="Contact Info">Contact Us</a>',
        'appraiser contact' => '<a href="index.php?ctlr=appraiser&action=contact" title="Contact Info">Contact Us</a>',
        'login' => '<a href="index.php" title="Log In">Log In</a>',
        'logout' => '<a href="index.php?ctlr=login&action=logout" title="Log Out">Log Out</a>');

    
    // Converts an array of nav keywords to the specified array of nav links for
    // the nav bar. The resulting array of nav links is stored in the $navlinks
    // static variable.
    public static function setNavLinks($navKeys) {
        self::$navLinks = array();        
        foreach ($navKeys as $key => $value) {
            if ($value === 'user profile') {
                array_push(self::$navLinks,
                    '<a href="index.php?ctlr=appraiser&action=getProfile" title="Update User Profile">'
                    . 'Hello ' . self::$userName . '</a>');
            } else if ($value === 'admin profile') {
                array_push(self::$navLinks,
                    '<a href="index.php?ctlr=admin&action=getProfile" title="Update Admin Profile">'
                    . 'Hello ' . self::$userName . '</a>');
            } else {
                array_push(self::$navLinks, self::$navMap[$value]);
            }
        }
    } 
}
