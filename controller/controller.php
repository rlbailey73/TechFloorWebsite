<!--
This is the controller which is a part of the MVC model. It takes instructions from
    the browser and will output a view or will interact with the model to get info
    from the database
-->
<?php
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
            include("../php/add_person.php");
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
            include("../view/currentevents.php");
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
            include("../view/pastevents.php");
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

?>