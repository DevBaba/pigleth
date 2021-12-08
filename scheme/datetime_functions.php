<?php

    /**
     * Other Resources:
     * https://www.w3schools.com/php/php_ref_date.asp
     * https://www.php.net/manual/en/datetime.format.php
     */


    /* Date Today ('Y-m-d')
     * get the date today , the default format is Y-m-d H:i:s or you can specify the format you want using the $format parameter
     * For more format options Goto: https://www.php.net/manual/en/datetime.format.php
     */
        function date_today($format='Y-m-d H:i:s')
        {
            return date($format);
        }

    /* Change Format of a Date
     * 
     */
        function change_date_format($date, $format='l, F j, Y') // default format is l, F j, Y (e.i.: Thu, December 5, 2021)
        {
            return date($format, strtotime($date));
        }

    /* Count Date - count the remaining days from datenow to a specific date
     * 
     */
        function count_date($until)
        {
            $d1=strtotime($until);
            return ceil(($d1-time())/60/60/24);
        }

    /* Add Days,Months,Weeks,or Years
     * 
     */
        function add_date($num = 1, $type='days', $format='Y-m-d H:i:s') //type = days,months,weeks,years
        {
            $d=strtotime("+" + $num + " " + $type); // "+2 days"
            return date($format, $d);
        }

    /* Substract Days,Months,Weeks,or Years
     * 
     */
        function sub_date($num = 1, $type='days', $format='Y-m-d H:i:s') //type = days,months,weeks,years
        {
            $d=strtotime("-" + $num + " " + $type); // "-2 days"
            return date($format, $d);
        }


?>