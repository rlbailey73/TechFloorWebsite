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
?>