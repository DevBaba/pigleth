<?php 

    class Database extends PDO{

        /**
         * THIS WILL BE CALL or USE TO YOUR QUERY like $this->db since this class will extends by your Model class
         * (this is null but it will give a value to openconnection() functions)
         * Meaning the value of this variable is the database connection, and it is use to your model (query)
         */
            public $db = null;

        /**
         *  Constructor - call openconnection() function so Every Query/Model always open a database connection.
         */ 
            function __construct(){
                try {
                    
                    // call openconnection() method
                    $this->openconnection();

                }catch(\PDOException $e){
                    exit('Something went wrong!. If problem persists contact administrator.');
                }
            }

        /*
        * -------------------------------------------------------
        *  Open DB Connection
        * -------------------------------------------------------
        */
            private function openconnection(){
                $options = array(
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // FETCH_ASSOC use echo $data['fname']; while FETCH_OBJ use echo $data->fname;
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // ERRMODE_WARNING or ERRMODE_EXCEPTION
                    PDO::ATTR_PERSISTENT => false,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                    //PDO::ATTR_EMULATE_PREPARES   => false,
                );
                try{
                    // Set a value to $db public variable - it will be use to your query statements at Model class e.g $this->db
                    // NOTE: DBHOST, DBPORT, DBNAME, and other constant variable are define in the core.php file
                    $this->db = new PDO('mysql' . ':host=' . DBHOST . DBPORT . ';dbname=' . DBNAME.';charset='.CHARSET, DBUSER, DBPASS, $options); // NOTE: DBHOST, DBPORT, DBNAME, and other constant variable are define in the core.php file
                } catch (Exception $e) {
                    throw new Exception($e->getMessage(), (int)$e->getCode());
                }
            }
    }


?>