<?php
/**This is Becky;s controller practice. Bre made the official one and this is to show we both worked with
 * it and watched the videos.
 * Bre already set up the navbar and everything with the links for controller so I'm only going to update those
 * for testing purposes then return them to good old controller.php
 * I also just used all of bre's names she had already so yeah... it looks basically the same, but i promise
 * I did it myself Jody.
 * Testing: Home, About, Admin, and SignUp
 */
    require_once '../model/beckymodel.php';

    //code from O'Donnell's video
    //every time we come in we check our action
    //and if it doesnt have an action to something we just return to the home page
    if(isset($_POST['action'])) //checks the get and post
    {
        $action = $_POST['action'];
    }
    else if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }
    //the default action will be to redirect to the home page if we don't find anything
    //if we receive no action we just go back to the home page
    else
    {
        include("../view/index.php");
        exit();
    }

    //this will only occur when an action occurs
    switch($action){
        case 'About':
            include '../view/about.php';
            break;
        case 'AddPerson':
            beckyaddmember();
            break;
        case 'Admin':
            include '../view/admin.php';
            break;
        case 'Home':
            include '../view/index.php';
            break;
        case 'SignUp':
            include '../view/signup.php';
            break;
        //included as view to return back
        default:
            include('../view/index.php'); //default for the switch takes us to index.php
    }

    /***** FUNCTIONS *****/
    function beckyaddmember()
    {
        //get the post values(keynames) and stores them into variables **adds layer of protection
        $firstName = $_POST['fName'];
        $lastName = $_POST['lName'];
        $email = $_POST['email'];

        //validation ensures that first and last name have values and email is valid
        if(empty($firstName))
        {
            $beckyErrorMessage= "<h3>Sign up failed. You forgot your first name</h3>";
            include '../view/beckyerror.php';
        }
        else if (empty($lastName))
        {
            $beckyErrorMessage =  "<h3>Sign up failed. You forgot your last name</h3>";
            include '../view/beckyerror.php';
        }
        else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $beckyErrorMessage = "<h3>Sign up failed. Make sure that you have entered a proper email</h3>";
            include '../view/beckyerror.php';
        }
        else //only adds a person if they fill out to the correct standards
        {
            //saves the new member using the model function
            beckysaveMemberInfo($firstName, $lastName, $email);
            //gets all of the members to output them
            $signupsheet= beckygetMembers();
            include '../php/add_person.php';
        }
    }
?>