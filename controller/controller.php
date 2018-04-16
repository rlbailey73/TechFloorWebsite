<!--
This is the controller which is a part of the MVC model. It takes instructions from
    the browser and will output a view or will interact with the model to get info
    from the database
-->
<?php
    require '../model/model.php';
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
        case 'AddPerson':
            addmember();
            break;
        case 'Admin':
            include("../view/admin.php");
            break;
        case 'CreateBrackets':
            include("../view/createbracket.php");
            break;
        case 'CreateEvent':
            include("../php/createevent.php");
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
        case 'SendEmails':
            include("../php/send_email.php");
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
        default:
            include("../view/index.php");

    }//end of switch

    /***** FUNCTIONS *****/
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

    //will be used to list all the current/upcoming events in a table on the webpage
    function listCurrentEvents()
    {
        //gets any rows that occur on or after current date
        $query = "SELECT EventName, Date, Time FROM events WHERE Date>=CURRENT_DATE ";
        //gets the results
        $results = getCurrentEvents($query);
        if(count($results)==0)
        {
            $errorMessage = "No events found at this time";
            include "../view/error.php";
        }
        else
        {
            include("../view/currentevents.php");
        }
    }//end listCurrenEvents

    //used to list all previous events on the webpage
    function listPreviousEvents()
    {
        //gets any rows that occured before current date
        $query = "SELECT EventName, Date, Time FROM events WHERE Date<CURRENT_DATE ";
        //gets the results
        $results = getCurrentEvents($query);
        if(count($results)==0)
        {
            $errorMessage = "No events found at this time";
            include "../view/error.php";
        }
        else {
            include("../view/pastevents.php");
        }
    }//end listPreviousEvents

?>