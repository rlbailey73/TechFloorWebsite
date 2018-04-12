<!--
Authors: Rebecca Bailey and Brenna Greggs
Purpose: This is the main page people will first see and the one they will be redirected to
        upon clicking on the logo. It contains a news feed of any interesting items and the
        twitter feed
-->
<?php
$title = "Sign Up"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

    <div class="index-template">
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <!-- border across top-->
            <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <div class = "col-4 offset-4"><!-- start Suggestions message_box -->
            <h1 class="message_box_title">Sign Up for Newsletter</h1>
            <div class = "message_box">
                <!--adding "required" makes it required on the client side (html 5)-->
                <form enctype="multipart/form-data" action="../controller/controller.php?action=AddPerson" method = "post" class="feed_side_space row">
                    <input name = "fName" type = "text" placeholder="Fist Name" required class = "form-control suggestion_item input_length" >
                    <input name = "lName" type = "text" placeholder="Last Name" required class = "form-control suggestion_item input_length" >
                    <input name = "email"type = "email" placeholder="email@eagle.clarion.edu" required class = "form-control suggestion_item input_length" >
                    <input type = "submit" value = "Join Now!" class = "form-control suggestion_item input_length"  >
                </form><!--end the form for suggestions-->
            </div>
        </div><!-- end Suggestion message_box -->
        </div>
    </div><!--end index-template-->
<?php
require '../view/footerinclude.php';
?>;