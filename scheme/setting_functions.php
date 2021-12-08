<?php

    /* 
     * side bar active 
     */
    function active($page)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $values = parse_url($actual_link);
        $links = explode('/',$values['path']);
        if($links[2] == $page) // change it to [1] if you use virtual host/ domain/ or if you uploaded it online (else [2] if in localhost)
        {
            echo 'active';
        }
    }

    /* 
     * Redirect to another location 
     */ 
    function redirect($page)
    {
        header('Location:'.base_url().$page.'.php');
        exit();
        //echo '<script type="text/javascript">
        //	    window.location.href="target'.base_url().$page.'.php";
        //    </script>';
    }

    /* 
     * base url / domain
     */
    function base_url()
    {
        return "http://localhost/pigs/"; // change it if you use it online (or uploaded to hosting server)
    }
    
?>