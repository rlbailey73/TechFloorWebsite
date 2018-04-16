<?php

    /**data base functions**/
    //return our pdo object which represents the db connection
    function getDBConnection()
    {
        //contains where you wanna run and the db name
        $dsn = 'mysql:host=localhost;dbname=s_bmgreggs_localtechfloor';
        //login credentials
        $username = 's_rlbailey';
        $password = 'PDSedia78';

        try
        {
            //instantiate a PDO object
            $db = new PDO($dsn, $username, $password);
        }
        catch (PDOException $e)
        {
            //output error message if something goes wrong
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }
        return $db;
    }

    //get the information of current events(events that are going to occur current day
    // or after current date)using function above should connect to database
    function getCurrentEvents($query)
    {
        try
        {
            $db = getDBConnection();
            /* ***Becky*** in the videos there was a line of code right here that had the query on it. i moved the query to the controller and have
                it passed in as an argument rn because for the events it doesnt make sense to have two functions where the only line was the query
                not sure if we want to use this funciton for all of the querys since in reality it will be the same steps just different "requests"*/
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
            return $results;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }
    }


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
