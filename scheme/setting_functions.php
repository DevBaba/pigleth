<?php

    /* 
     * side bar active 
     */
    function active($page)
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $values = parse_url($actual_link);
        $links = explode('/',$values['path']);
        $i = 2;
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        {
            $i = 1;
        }
        if($links[$i] == $page)
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
        return BASE_URL;
    }
    
?>