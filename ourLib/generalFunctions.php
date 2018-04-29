<?php
    //takes db type date and puts it into a nicer format for us
    function toDisplayDate($date)
    {
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
?>