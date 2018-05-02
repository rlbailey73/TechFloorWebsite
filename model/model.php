<?php

    /**data base functions**/
    //return our pdo object which represents the db connection
    function getDBConnection()
    {
        //$dsn contains where you wanna run and the db name
        $dsn = 'mysql:host=localhost;dbname=s_bmgreggs_localtechfloor'; //access to bre's local db and to cisprod
        //$dsn = 'mysql:host=localhost;dbname=s_rlbailey_techfloordemo'; //access to beckys database for local hosting purposes
        //login credentials
        /** We need to make sure we change this back before submitting $username */
        //$username = 's_rlbailey';
        //$password = 'techfloor99';
        //for local testing
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

    //specifically retrieves officer position members from a list and shows them.
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


    //used to be able to search for members based of their first name
    function getGeneralSearch($Criteria)
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM member WHERE FirstName LIKE :Criteria OR LastName LIKE :Criteria";
            $statement=$db->prepare($query);
            $statement->bindValue(':Criteria', "%$Criteria%");
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
            $memList['MemberImagePath']= getMemberImage($memberID);
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

    //method ot get image path
    function getMemberImage($memberID){
        $memberImages = "../DataFiles/memberimages";
        $memberFilePath = "$memberImages/$memberID.png";

        if(is_file($memberFilePath)){
            return $memberFilePath;
        }else{
            return "";
        }
    }

    //inserts a new event into the database membersignup isn't included since it defaults to zero
    function insertEvent($eventName, $date, $time, $description, $type )
    {
        $db = getDBConnection();
        $query = 'INSERT INTO events (EventName, Date, Time, Description, Type)
                  VALUES(:eventName, :date, :time, :description, :type)';
        $statement = $db->prepare($query);

        //bindings to avoid sql injections
        $statement->bindValue(':eventName', $eventName);
        $statement->bindValue(':date', toMySQLDate($date));
        $statement->bindValue(':time', $time);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':type', $type);

        $success = $statement->execute();
        $statement->closeCursor();

        if ($success)
        {
            return $db->lastInsertId(); //gets the last generated eventID
        }
        else
        {
            //should be code to log the sql error for out purposes we just wanna display
            logSQLError($statement->errorInfo());
        }
    }

    //inserts a new event into the database membersignup isn't included since it defaults to zero
    function updateEvent($eventID, $eventName, $date, $time, $description, $type )
    {
        $db = getDBConnection();
        $query = 'UPDATE events SET EventName=:eventName, Date=:date, Time=:time, Description=:description, Type=:type 
                  WHERE EventID=:eventID';
        $statement = $db->prepare($query);

        //bindings to avoid sql injections
        $statement->bindValue(':eventID', $eventID);
        $statement->bindValue(':eventName', $eventName);
        $statement->bindValue(':date', toMySQLDate($date));
        $statement->bindValue(':time', $time);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':type', $type);

        $success = $statement->execute();
        $statement->closeCursor();

        if ($success)
        {
            return $statement->rowCount(); //gets rows affected
        }
        else
        {
            //should be code to log the sql error for out purposes we just wanna display
            logSQLError($statement->errorInfo());
        }
    }

    /* inserts a new Member in the database
    some of the items aren't included as they get automatically set. */
    function insertMember($fName, $lName, $email, $classStanding, $image, $description, $extraEmails, $memberSince)
    {
        $db = getDBConnection();
        $query = 'INSERT INTO member (FirstName, LastName, Email, ClassStanding, Image, Description, ExtraEmails, MemberSince)
                  VALUES(:fName, :lName, :email, :classStanding, :image, :memberDesc, :extraEmails, :memberSince)';
        $statement = $db->prepare($query);

        //bindings to avoid sql injections
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':classStanding', $classStanding);
        if(empty($image)){
            $statement->bindValue(':image', null, PDO::PARAM_NULL);
        }
        else{
            $statement->bindValue(':image', $image);
        }
        if(empty($description)){
            $statement->bindValue(':memberDesc', null, PDO::PARAM_NULL);
        }
        else{
            $statement->bindValue(':memberDesc', $description);
        }
        $statement->bindValue(':extraEmails', $extraEmails);
        $statement->bindValue(':memberSince', toMySQLDate($memberSince));

        $success = $statement->execute();
        $statement->closeCursor();

        if ($success)
        {
            return $db->lastInsertId(); //gets the last generated memberID
        }
        else
        {
            //should be code to log the sql error for out purposes we just wanna display
            logSQLError($statement->errorInfo());
        }
    }

    //used to update members throughout the processssssssssss
    function updateMember($memberID, $fName, $lName, $email, $classStanding, $image, $description, $extraEmails, $memberSince){
        $db = getDBConnection();
        $query = 'UPDATE member SET FirstName=:fName, LastName=:lName, Email=:email, ClassStanding=:classStanding, Image=:image, Description=:memberDesc, ExtraEmails=:extraEmails, MemberSince=:memberSince
                  WHERE MemberID=:memberID';
        $statement = $db->prepare($query);

        //bindings to avoid sql injections
        $statement->bindValue(':memberID', $memberID);
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':classStanding', $classStanding);
        if(empty($image)){
            $statement->bindValue(':image', null, PDO::PARAM_NULL);
        }
        else{
            $statement->bindValue(':image', $image);
        }
        if(empty($description)){
            $statement->bindValue(':memberDesc', null, PDO::PARAM_NULL);
        }
        else{
            $statement->bindValue(':memberDesc', $description);
        }
        $statement->bindValue(':extraEmails', $extraEmails);
        $statement->bindValue(':memberSince', toMySQLDate($memberSince));

        $success = $statement->execute();
        $statement->closeCursor();

        if ($success)
        {
            return $statement->rowCount();
        }
        else
        {
            //should be code to log the sql error for out purposes we just wanna display
            logSQLError($statement->errorInfo());
        }
    }

    function logSQLError($errorMessage)
    {
        include '../view/error.php';
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