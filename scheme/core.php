<?php 
    /******core.php********
     **********************
     */

    ob_start();

    /**
     * To hide the error when in production
     * set to 1 if you're on development - e.g. ini_set('display_errors', 1); 
     * and 0 in production - e.g. ini_set('display_errors', 0);
     */
        ini_set('display_errors', 1);

    /**
     * Database Information
     */
        define('DBHOST','localhost');
        define('DBNAME','');
        define('DBUSER','');
        define('DBPASS','');
        define('CHARSET','utf8');
        //define('DBPORT',':3306');
    
    /**
     * Base URL
     */
    define('BASE_URL','http://localhost/project/');  // change it if you use it online (or uploaded to hosting server)

    /*
     * inlude all in one - 
     * so all the pages call this file(core) will also have these files(setting, security, datetime_functions, database/Model)
     */
        require_once('setting_functions.php');
        require_once('security_functions.php');
        require_once('datetime_functions.php');
        // require_once('FormValidation.php'); - UNDER DEVELOPMENT
        require_once('database/Model.php');

    /**
     * start session here
     * so all the pages that call this file(core.php) will use this session_start() method.
     * you don't need to add session_start(); to all your pages
     */
        session_start(); // in order to use sessions to your page, you need session_start() first

?>