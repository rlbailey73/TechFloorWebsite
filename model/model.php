<?php

    //saves someone that has signed up for emails
    function saveMemberInfo($firstName, $lastName, $email)
    {
        //this creates the file initially if it doesn't exits allowing for appending at the end and reading
        $file = fopen('../datafiles/email_list.csv', 'ab');
        //adds the details to the file
        fputcsv($file, array($firstName, $lastName, $email));
        //closes the file
        fclose($file);
    }

    function getMembers()
    {
        //this creates the file initially if it doesn't exits allowing for reading at the start and reading
        $file = fopen('../datafiles/email_list.csv', 'rb');
        //this cycles through to output the members
        while(($data = fgetcsv($file))!=FALSE)
        {
            //gets all parts of the signup and will output it
            $signupsheet[]=array($data[0], $data[1], $data[2]);
        }
        //closes the file
        fclose($file);
        return $signupsheet;
    }
