<!--
This is the controller which is a part of the MVC model. It takes instructions from
    the browser and will output a view or will interact with the model to get info
    from the database-->
<?php
    //this allows us access to the functions in this file these are okay here
      //since our controller is a part of our views due to include?
    require_once '../model/model.php';
    require_once '../ourLib/generalFunctions.php';

    //check the get and post for an action
    if(isset($_POST['action']))
    {
        $action = $_POST['action'];
    }
    else if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    //if we don't find anything we redirect to our home page
    else
    {
        include("../view/index.php");
        exit();
    }

    //using the set action, we use switches to navigate to a page or access model
    //ALPHABETICAL ORDER!!
    switch($action){
        case 'About':
            include("../view/about.php");
            break;
        case 'AccountAddEdit':
            accountAddEdit();
            break;
        case 'AddAccount':
            addAccount();
            break;
        case 'AddPerson':
            addmember();
            break;
        case 'Admin':
            loadAdmin();
            break;
        case 'CreateBrackets':
            include("../view/createbracket.php");
            break;
        case 'CreateEvent':
            addEvent();
            break;
        case 'CurrentBrackets':
            include("../view/currentbrackets.php");
            break;
        case 'CurrentEvents':
            listCurrentEvents();
            break;
        case 'FindUs':
            include("../view/findus.php");
            break;
        case 'Home':
            include("../view/index.php");
            break;
        case 'Ideas':
            include("../view/ideas.php");
            break;
        case 'ListMembers':
            listMembers();
            break;
        case 'PastBrackets':
            include("../view/pastbrackets.php");
            break;
        case 'PastEvents':
            listPreviousEvents();
            break;
        case 'Profile':
            include("../view/profile.php");
            break;
        case 'Resources':
            include("../view/resources.php");
            break;
        case 'SignUp':
            include("../view/signup.php");
            break;
        case 'SearchMembers':
            searchMembers();
            break;
        case 'SendEmails':
            include("../php/send_email.php");
            break;
        case 'ShowEvent':
            displayEventDetails();
            break;
        case 'ShowEventType':
            eventType();
            break;
        case 'UploadMemberIcon':
            include("../php/uploadedMemberIcons.php");
            break;
        case 'UploadNews':
            include("../php/uploadednews.php");
            break;
        case 'UploadPictures':
            include("../php/uploadedimages.php");
            break;
        case 'UploadQuotes':
            include("../php/uploadedquotes.php");
            break;
        case 'ViewMember':
            viewMember();
            break;
        default:
            include("../view/index.php");

    }//end of switch

    /***** FUNCTIONS *****/

    //will be used to actually submit and edit members
    function accountAddEdit(){
        print_r($_POST);

        $mode = "add"; //will be used to tell us when we are in adding mode or editing mode with account info

        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];
        $classStanding = $_POST['classStanding'];
        $image = $_POST['image'];
        $description =$_POST['memberDesc'];
        if(isset($_POST['extraEmails'])){
            $extraEmails = "Y";
        }
        else{
            $extraEmails = "N";
        }
        date_default_timezone_set("America/New_York"); //should help make our date be more accurate
        $memberSince = date("Y-m-d");

        //validation
        $errorMessage = "";

        if(empty($firstName) || strlen($firstName) > 30){
            $errorMessage .= "\\n* First name required and must be less than 30 characters.";
        }
        if(empty($lastName) || strlen($lastName) > 30){
            $errorMessage .= "\\n* Last name required and must be less than 30 characters.";
        }
        if(empty($email) || strlen($email) > 50){
            $errorMessage .= "\\n* Email required and must be less than 50 characters.";
        }
        if(empty($classStanding) || strlen($classStanding) > 25){
            $errorMessage .= "\\n* Class Standing required and must be selected from the drop down.";
        }

        //this will take u back to the edit page if any errors occur
        if($errorMessage != ""){
            include '../view/editaccount.php';
        } else {
            $memberID = insertMember($firstName, $lastName, $email, $classStanding, $image, $description, $extraEmails, $memberSince);

            //after member successfully submitted into the database, we should take them to their display page for
            //individual members. I want this to take u to the profile screen instead once thats complete
            //send back the header of the page using a redirect
            header("Location: ../controller/controller.php?action=ViewMember&MemberID=$memberID");
        }
    }

    //will be used to create an account in the list. will add password and things soon.
    function addAccount(){
        $mode = "add"; //will be used to tell us when we are in adding mode or editing mode with account info

        $firstName = "";
        $lastName = "";
        $email = "";
        $classStanding = "";
        $position = "";
        $image = "";
        $description ="";
        $extraEmails = "Y";
        $memberSince = "";

        include '../view/editaccount.php';
    }

    function addEvent()
    {
        //this messed up odonells code so we comment out - error was that we started header already since this outputs
        //print_r($_POST);
        $eventName = $_POST['eventName'];
        $eventDate = $_POST['eventDate'];
        $eventTime = $_POST['eventTime'];
        $eventDesc = $_POST['eventDesc'];
        $eventType=$_POST['eventType'];

        //collect all the errors we encounter
        $errorMessage="";
        if(empty($eventName) || strlen($eventName)> 50)
        {
            $errorMessage .= "An event name is required and must be less than 50 characters\\n";
        }
        if(empty($eventDate) && !strtotime($eventDate))
        {
            $errorMessage .= "Either enter a valid date\\n";
        }
        if(empty($eventTime))
        {
            $errorMessage .= "An event time is required\\n";
        }
        if(empty($eventDesc))
        {
            $errorMessage .= "An event description is required\\n";
        }
        if($eventType=="None")
        {
            $errorMessage .= "An event type is required\\n";
        }

        //check if we have accumulated any errors
        if($errorMessage!="")
        {
            //if error messages, send back to admin and output errors in alert
            include '../view/admin.php';
        }
        else //actually add the event if no errors exist
        {
            //we need something to store the created id when we call our insertevent function
            $eventID = insertEvent($eventName, $eventDate, $eventTime, $eventDesc, $eventType);
            /*after adding the new event we want to display the details, but even tho we have
            an id, we can't go directly to our display details page bc it doen't want just an id
            it wants an array based off an id. to make this work, we will use redirection which is
            what we use to take a user directly to the home page instead of being able to see
            inside files which is risky*/
            //this uses header(not the format) to redirect back to controller and call showevent passing in the id we just recieved
            header("Location: ../controller/controller.php?action=ShowEvent&EventID=$eventID");

        }
    }



    function addmember()
    {
        //get the post values(keynames) and stores them into variables **adds layer of protection
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];

        //validation ensures that first and last name have values and email is valid
        if(empty($firstName))
        {
            $errorMessage= "<h3>Sign up failed. You forgot your first name</h3>";
            include '../view/error.php';
        }
        else if (empty($lastName))
        {
            $errorMessage =  "<h3>Sign up failed. You forgot your last name</h3>";
            include '../view/error.php';
        }
        else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorMessage = "<h3>Sign up failed. Make sure that you have entered a proper email</h3>";
            include '../view/error.php';
        }
        else //only adds a person if they fill out to the correct standards
        {
            //saves the new member using the model function
            saveMemberInfo($firstName, $lastName, $email);
            //gets all of the members to output them
            $signupsheet= getMembers();
            include '../php/add_person.php';
        }
    }

    //this gets the details of any event requested whether it is a current or previous
    function displayEventDetails()
    {
        //get value from url
        $eventID = $_GET['EventID'];
        //make sure we got a value
        if(!isset($eventID))
        {
            $errorMessage = "You must provide an EventID to display";
            include '../view/error.php';
        }
        else
        {
            $row = getDetails($eventID);
            if($row==false)
            {
                $errorMessage = "That event was not found";
                include '../view/error.php';
            }
            else{
                include '../view/displayEvent.php';
            }
        }
    }

    //this will pull the events with  specific type
    function eventType()
    {
        //get value from url
        $eventType = $_GET['Type'];
        //make sure we got a value
        if(!isset($eventType))
        {
            $errorMessage = "You must provide an EventID to display";
            include '../view/error.php';
        }
        else
        {
            //call function to do query based on event type
            $results = getEventType($eventType);
            //if not events exist
            if(count($results)==0)
            {
                $errorMessage = "No events of that type found";
                include '../view/error.php';
            }
            else if (count($results)==1)
            {
                $row = $results[0];
                include "../view/displayEvent.php";
            }
            else{
                //go back to past events and update the list
                include '../view/pastevents.php';
            }
        }
    }

    //will be used to list all the current/upcoming events in a table on the webpage
    function listCurrentEvents()
    {
        //gets any rows that occur on or after current date **we want to select all bc in our output we can specify what actually shows(we need the id later)
        $query = "SELECT * FROM events WHERE Date>=CURRENT_DATE order by Date";
        //gets the results
        $results = getEvents($query);
        if(count($results)==0)//i tthink this would be moe appropriate on actual event screeen vvs an error mesage page but idk **Becky**
        {
            $errorMessage = "No events found at this time";
            include "../view/error.php";
        }
        else if (count($results)==1)
        {
            $row = $results[0];
            include "../view/displayEvent.php";
        }
        else
        {
            include("../view/currentevents.php");
        }
    }//end listCurrenEvents

    //used to list all previous events on the webpage
    function listPreviousEvents()
    {
        //gets any rows that occured before current date **we want to select all(*) bc in our output we are able to specify what actually shows(we need the id later)
        $query = "SELECT * FROM events WHERE Date<CURRENT_DATE order by Date";
        //gets the results
        $results = getEvents($query);
        if(count($results)==0)
        {
            $errorMessage = "No events found at this time";
            include "../view/error.php";
        }
        else if (count($results)==1)
        {
            $row = $results[0];
            include "../view/displayEvent.php";
        }
        else {
            include("../view/pastevents.php");
        }
    }//end listPreviousEvents

    //will be used in order to display the list of users that meet a certain type
    function listMembers()
    {
        $listType = $_GET['ListType'];
        if($listType == 'Position')
        {
            $memList = getBoardMembers();
        }
        else if($listType == 'NewsLetterList')
        {
            $memList = getNewsLetterList();
        }
        else if ($listType == 'GeneralSearch')
        {
            $memList = getGeneralSearch($_GET['Criteria']);
        }
        else{
            $memList = getMemberList();
        }
        if(count($memList) == 0){
            $errorMessage = "No members found.";
            include"../view/error.php";
        }
        else if (count($memList)==1)
        {
            $row = $memList[0];
            include "../view/displaySingleMember.php";
        }
        else{
            //need to include our view
            include "../view/membersearch.php";
        }
    }

    /**this contains many parts of functions since multiple things are in admin and need loaded**/
    function loadAdmin()
    {
        //determine if we edit or add
        $mode = "add";
        //when in add mode we need default values
        $eventName = "";
        $eventDate =  "";
        $eventTime = "";
        $eventDesc =  "";
        $eventType= "";

        include '../view/admin.php';
    }

    // helps us search the members using the actual db values   `
    function searchMembers()
    {
        $memList = getMemberList();
        if(count($memList) == 0){
            $errorMessage = "No members found.";
            include"../view/error.php";
        }
        else if (count($memList)==1)
        {
            $row = $memList[0];
            include "../view/displaySingleMember.php";
        }
        else{
            //need to include our view
            include "../view/membersearch.php";
        }
    }

    //job to display a single member that you click on
    function viewMember()
    {
        $memberID = $_GET['MemberID']; //reads value from url

        //makes sure we received a value or not
        if(!isset($memberID)){
            $errorMessage = "A memberID must be provided to display.";
            include "../view/error.php";
        }
        else{
            $row = getMemberSingle($memberID);
            if($row == FALSE){
                $errorMessage = "That member was not found.";
                include "../view/error.php";
            }
            else{
                include "../view/displaySingleMember.php";
            }
        }
    }

?>