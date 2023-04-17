<?php

/**
 * Input Validations --------- UNDER DEVELOPMENT PA
 */
class FormValidation
{
    public static $err = [];

    public function run()
    {
        if(FormValidation::$err == [])
        {
            return true;
        }else{
            $err_mess = "";
            foreach(FormValidation::$err as $mes)
            {
                $err_mess . ', ' . $mes;
            }
            return $err_mess;
        }
    }

    /**
     * Required Method
     * how to use?
     * 1. required(['fname|First Name','lname|Last Name']);
     * 2. required(['fname|First Name','lname|Last Name'], ' is required');
     * fname & lname are the name of input while the First Name and Last Name are the readable/placeholder of that fields
     */
    public function required($names=[], $custom_error = " value must not be empty")
    {     
        foreach($names as $x)
        {
            if(count(explode("|",$x)) > 1)
            {
                $txt = explode("|",$x)[1];
            }
            else
            {
                $txt = $x;
            }

            $x = explode("|",$x)[0];

            if(isset($_POST[$x]))
            {
                // validate
                if($_POST[$x] == '' || $_POST[$x] == null)
                {
                    // message
                    if(array_key_exists($x, FormValidation::$err))
                    {
                        FormValidation::$err[$x] = 	FormValidation::$err[$x] . ", " . $txt . $custom_error;
                    }
                    else
                    {
                        FormValidation::$err[$x] = 	$txt . $custom_error;
                    }

                }
            }
        }
        return FormValidation::$err;
    }

    public function alpha($names=[], $custom_error = " value must be a letters")
    {
        foreach($names as $x)
        {
            if(count(explode("|",$x)) > 1)
            {
                $txt = explode("|",$x)[1];
            }
            else
            {
                $txt = $x;
            }

            $x = explode("|",$x)[0];

            if(isset($_POST[$x]))
            {
                // validate
                if(!ctype_alpha($_POST[$x]))
                {
                    // message
                    if(array_key_exists($x, FormValidation::$err))
                    {
                        FormValidation::$err[$x] = 	FormValidation::$err[$x] . ", " . $txt . $custom_error;
                    }
                    else
                    {
                        FormValidation::$err[$x] = 	$txt . $custom_error;
                    }

                }
            }
        }
        return FormValidation::$err;
    }

}
?>