<!--
Authors: Rebecca Bailey and Brenna Greggs
Purpose: This is the main page people will first see and the one they will be redirected to
        upon clicking on the logo. It contains a news feed of any interesting items and the
        twitter feed
-->
<?php
$title = "Sign Up"; //necessary variable to have each pages title be unique
require './headerinclude.php';

function add_to_email_list()
{
    //path to the file that holds the names
    $list = "../datafiles/email_list.txt";
    //gets the contents and puts into something we can add to
    $thislist = file_get_contents($list);
    //adds the users information using POST method
    //$thislist .=
}

?>

    <div class="index-template">
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <!-- border across top-->
            <img class = "col-10 offset-1" src = "../images/temp.png" alt = "cool blue techy background"  >

        <div class = "col-4 offset-4"><!-- start Suggestions message_box -->
            <h1 class="message_box_title">Sign Up for Newsletter</h1>
            <div class = "message_box">
                <form enctype="multipart/form-data" action="add_to_email_list" method = "post" class="feed_side_space row">
                    <input class = "form-control suggestion_item input_length" type = "text" placeholder="Fist Name">
                    <input class = "form-control suggestion_item input_length" type = "text" placeholder="Last Name">
                    <input class = "form-control suggestion_item input_length" type = "email" placeholder="email@eagle.clarion.edu">
                    <input class = "form-control suggestion_item input_length" type = "submit" >
                </form><!--end the form for suggestions-->
            </div>
        </div><!-- end Suggestion message_box -->
        </div>
    </div><!--end index-template-->

<?php
require './footerinclude.php';
?>;