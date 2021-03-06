<?php
    //takes db type date and puts it into a nicer format for us
    function toDisplayDate($date)
    {
        date_default_timezone_set("America/New_York");
        //try to convert date from db to normal date
        if($phpDate=strtotime($date))
        {
            return date('m/d/Y', $phpDate); //don't do mm/dd/yy it get weird!!!
        }
        else //if data was null or not a real date, we return date empty
        {
            return "";
        }
    }

    //takes a user formated date and converts it to the form that mysql likes
    function toMySQLDate($date)
    {
        date_default_timezone_set("America/New_York");
        //try to convert date from db to normal date
        if($sqlDate=strtotime($date))
        {
            return date('Y/m/d', $sqlDate); //don't do mm/dd/yy it get weird!!!
        }
        else //if data was null or not a real date, we return date empty
        {
            return "";
        }
    }

    //will prevent a billion slashes from showing up in the code.
    function unQuote(){
        if(get_magic_quotes_gpc()){
            function stripslashes_gpc(&$value)
            {
                $value = stripslashes($value);
            }
            array_walk_recursive($_GET, 'stripslashes_gpc');
            array_walk_recursive($_POST, 'stripslashes_gpc');
            array_walk_recursive($_COOKIE, 'stripslashes_gpc');
            array_walk_recursive($_REQUEST, 'stripslashes_gpc');
        }
    }
?>