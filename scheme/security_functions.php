<?php

    /*
     * -------------------------------------------------------
     *  Generate CSRF Token
     * -------------------------------------------------------
     */
        function CSRFToken(){
            $_SESSION['token'] = bin2hex(random_bytes(32));
            return $_SESSION['token'];
        }

    /*
     * -------------------------------------------------------
     *  Verify CSRF Token
     * -------------------------------------------------------
     */

        function CSRFProtect($token){
            if(hash_equals($_SESSION['token'], $token)){
                return true;
            }else{
                return false;
            }
        }


    /*
     * -------------------------------------------------------
     *  Sanitize Outputs
     * -------------------------------------------------------
     */

        function Sanitize($string){
            return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
        }


    /*
     * -------------------------------------------------------
     *  Clean Data Inputs
     * -------------------------------------------------------
     */

        function cleanData($string){
            $string = trim($string);
            $string = stripslashes($string);
            return $string;
        }



?>