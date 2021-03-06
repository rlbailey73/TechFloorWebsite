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

    function getAllEvents()
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM events ORDER BY Date DESC";
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
    }//end getAllEvents

    /*
    * purpose: return a list of the ongoing events - based on the currentday
    */
    function getOngoingEvents()
    {
        try
        {
            $db = getDBConnection();
            $query = "SELECT * FROM events WHERE Date>=CURRENT_DATE ORDER BY Date DESC";
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
    }//end ongoing events

    /*
     * purpose: return a list of the previous events - based on the currentday
     */
    function getPastEvents()
    {
        try
        {
            $db = getDBConnection();
            $query = "SELECT * FROM events WHERE Date<CURRENT_DATE ORDER BY Date DESC";
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
    }//end pastevents

    /*
     * purpose: perform a search on the events table that allows user to search for any value
     */
   function getGeneralEventSearch($criteria)
   {
       try{
           //get our connection again
           $db = getDBConnection();
           $query = "SELECT * FROM events WHERE * = :criteria ORDER BY Date DESC";
           $statement=$db->prepare($query);
           $statement->bindValue(':criteria', '%$criteria%');
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
   }//end getGeneralEventSearch

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

    function deleteEvent($eventID)
    {
         $db=getDBConnection();
         $query='DELETE FROM events WHERE EventID=:eventID';
         $statement=$db->prepare($query);
         $statement->bindValue(':eventID', $eventID);
         $success =$statement->execute();
         $statement->closeCursor();

         if($success)
         {
             return $statement->rowCount();//number of rows that were affected (should be 1 or 0)
         }
         else
         {
             logSQLError($statement->errorInfo());
         }
    }//end deleteEvent

    /*gets all rows information where it meets the query*/
    function getEventType($eventType)
    {
        try{
            //get our connection again
            $db = getDBConnection();
            $query = "SELECT * FROM events WHERE Type = :eventType ORDER BY Date DESC";
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
            $memList['MemberImagePath']= memberCheckImagePath($memberID);
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

    //method ot get image path no matter wht
    function getMemberImage($memberID){
        $memberImages = "../DataFiles/memberimages";
        return "$memberImages/$memberID.jpg";
    }

    //cehcks to see if the image exists and if it doesnt return blank
    function memberCheckImagePath($memberID){
        //just retrieves the path name
        $memberFilePath = getMemberImage($memberID);
        //checks if existing file
        if(is_file($memberFilePath)){
            return $memberFilePath;
        }else{
            return "";
        }
    }

    //will be used to save image in th edb based on filepath
    function memberSaveImageFile($memberID, $imageTempPath){
        //this call helps determine where we are saving it permanently
        if($imageTempPath != ""){
            $newImagePath = getMemberImage($memberID);
            //try to move the file to its permanent location
            if(move_uploaded_file($imageTempPath, $newImagePath) == FALSE){
                $errorMessage = "Unable to move the image file.";
                include'../view/error.php';
            }
        }
    }

    //used to delete the image files when deleting a record
    function memberDeleteImage($memberID){
        $imageFilePath = memberCheckImagePath($memberID);
        if($imageFilePath != ""){
            if (unlink($imageFilePath)==FALSE){
                $errorMessage ="Unable to delete image file at $imageFilePath";
                include '../view/error.php';
            }
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
    function insertMember($fName, $lName, $email, $classStanding, $imageTempPath, $description, $extraEmails, $memberSince)
    {
        $db = getDBConnection();
        $query = 'INSERT INTO member (FirstName, LastName, Email, ClassStanding, Image, Description, ExtraEmails, MemberSince)
                  VALUES(:fName, :lName, :email, :classStanding, :imageTempPath, :memberDesc, :extraEmails, :memberSince)';
        $statement = $db->prepare($query);

        //bindings to avoid sql injections
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':classStanding', $classStanding);
        if(empty($image)){
            $statement->bindValue(':imageTempPath', null, PDO::PARAM_NULL);
        }
        else{
            $statement->bindValue(':imageTempPath', $image);
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
            //b4 return, we need to save the image file if we were given one
            memberSaveImageFile($db->lastInsertId(),$imageTempPath);
            return $db->lastInsertId(); //gets the last generated memberID
        }
        else
        {
            //should be code to log the sql error for out purposes we just wanna display
            logSQLError($statement->errorInfo());
        }
    }

    //used to update members throughout the processssssssssss
    function updateMember($memberID, $fName, $lName, $email, $classStanding, $imageTempPath, $deleteImage, $description, $extraEmails, $memberSince){
        $db = getDBConnection();
        $query = 'UPDATE member SET FirstName=:fName, LastName=:lName, Email=:email, ClassStanding=:classStanding, Image=:imageTempPath, Description=:memberDesc, ExtraEmails=:extraEmails, MemberSince=:memberSince
                  WHERE MemberID=:memberID';
        $statement = $db->prepare($query);

        //bindings to avoid sql injections
        $statement->bindValue(':memberID', $memberID);
        $statement->bindValue(':fName', $fName);
        $statement->bindValue(':lName', $lName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':classStanding', $classStanding);
        if(empty($imageTempPath)){
            $statement->bindValue(':imageTempPath', null, PDO::PARAM_NULL);
        }
        else{
            $statement->bindValue(':imageTempPath', $imageTempPath);
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
            //before we accept save our image file
            memberSaveImageFile($memberID, $imageTempPath);
            if($deleteImage && $imageTempPath == ""){
                memberDeleteImage($memberID);
            }
            return $statement->rowCount();
        }
        else
        {
            //should be code to log the sql error for out purposes we just wanna display
            logSQLError($statement->errorInfo());
        }
    }

    //will be ussd to delete a specific member from the table in the db
    function deleteMemberOne($memberID){
        $db = getDBConnection();
        //delete statement to delete a specific member
        $query = 'DELETE FROM member WHERE MemberID = :memberID';

        $statement = $db->prepare($query);
        $statement->bindValue(':memberID', $memberID);

        $success = $statement->execute();
        $statement->closeCursor();

        if($success){
            //we need to check if htey have an image, and if they do dlete it.
            memberDeleteImage($memberID);
            //number of rows affected
            //in this case there should be only one row affected as this deletes a specific member
            return $statement->rowCount();
        }else {
            //displays the error message in case something wonky happens
            logSQLError($statement->errorInfo()); //log error
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