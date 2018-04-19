<?php

    /**data base functions**/
    //return our pdo object which represents the db connection
    function getDBConnection()
    {
        //contains where you wanna run and the db name
        $dsn = 'mysql:host=localhost;dbname=s_bmgreggs_localtechfloor';
        //$dsn = 'mysql:host=localhost;dbname=s_rlbailey_techfloordemo'; //access to my database for local hosting purposes
        //login credentials
        /** We need to make sure we change this back before submitting $username */
        //$username = 's_rlbailey';
        //$password = 'techfloor99';
        $username = 'root';
        $password = '';

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
    function getEvents($query)
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

    /*gets a rows information -- using just fetch will save memory by returning 1 row at a time*/
    function getDetails($eventID)
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM events WHERE EventID = :eventID";
            $statement=$db->prepare($query);
            $statement->bindValue(':eventID', $eventID);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }

    }//end getDetails

    /*gets all rows information where it meets the query*/
    function getEventType($eventType)
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM events WHERE Type = :eventType";
            $statement=$db->prepare($query);
            $statement->bindValue(':eventType', $eventType);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }

    }//end getEventType

    /*gets all rows information where it meets the query
    This function is designed to retrieve the full list of members and display it on the sign up
    page in a list view.
    //fetchall cuz retrieves everything*/
    function getMemberList()
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM member order by LastName, FirstName";
            $statement=$db->prepare($query);
            $statement->execute();
            $memList = $statement->fetchAll();
            $statement->closeCursor();
            return $memList;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }
    }//end getMemberList

    function getBoardMembers()
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM member WHERE Position != 'Member'";
            $statement=$db->prepare($query);
            $statement->execute();
            $memList = $statement->fetchAll();
            $statement->closeCursor();
            return $memList;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }

    }//end getMemberList


    function getNewsLetterList()
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM member WHERE ExtraEmails = 'Y'";
            $statement=$db->prepare($query);
            $statement->execute();
            $memList = $statement->fetchAll();
            $statement->closeCursor();
            return $memList;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }

    }//end getMemberList

    /*gets single row information where it meets the query
        retrieve the individual member clicked and display them on their own page
    regular fetch becuz it just retrieves by certain details*/
    function getMemberSingle($memberID)
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM member WHERE MemberID = :memberID";
            $statement=$db->prepare($query);
            $statement->bindValue(':memberID', $memberID);
            $statement->execute();
            $memList = $statement->fetch();
            $statement->closeCursor();
            return $memList;
        }
        catch(PDOException $e)
        {
            $errorMessage = $e->getMessage();
            include '../view/error.php';
            die;
        }

    }//end getMemberList

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
