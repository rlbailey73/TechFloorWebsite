<?php
$title = "Create Account"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template">
    <div class = "row table_format"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <div class = "col-6 offset-3 "><!-- start Suggestions message_box -->
            <h1 class="message_box_title">Create Your TechFloor Account</h1>
            <div class = "message_box">
                <!--adding "required" makes it required on the client side (html 5)-->
                <form enctype="multipart/form-data" action="../controller/controller.php?action=AccountAddEdit" method = "post" class="feed_side_space row">
                    <label>First Name:</label>
                    <input name = "fName" type = "text" value ="<?php echo $firstName ?>" placeholder="First Name"  class = "form-control suggestion_item input_length" >
                    <label>Last Name:</label>
                    <input name = "lName" type = "text" value ="<?php echo $lastName ?>" placeholder="Last Name"  required class = "form-control suggestion_item input_length" >
                    <label>Clarion Email Address:</label>
                    <input name = "email" type = "email" value ="<?php echo $email ?>" placeholder="email@eagle.clarion.edu"  required class = "form-control suggestion_item input_length" >
                    <label>Select your Class Standing:</label>
                    <select name="classStanding" class = "form-control" value ="<?php echo $classStanding ?>" >
                        <option value="">Select...</option>
                        <option value="Freshman">Freshman</option>
                        <option value="Sophomore">Sophomore</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Graduate">Graduate</option>
                        <option value="Adult?">Adult?</option>
                    </select>
                    <label>Choose your Profile Image:</label>
                    <input name = "memberIcon" type = "file" class="input_length"/>
                    <label>Describe your interests:</label>
                    <textarea class = "form-control suggestion_item input-length" rows = 10 value ="<?php echo $description ?>" ></textarea>
                    <label>Receive our Event Information:</label>
                    <input name = "extraEmails" type = "checkbox" <?php if($extraEmails == 'Y') echo 'checked' ?> required class = "form-control suggestion_item input_length" >
                    <input type = "submit" value = "Create Account" class = "form-control suggestion_item input_length"  >
                </form><!--end the form for suggestions-->
            </div>
        </div><!-- end Suggestion message_box -->
    </div>
</div><!--end index-template-->

<script>
    // \\n is escaping it so its not recognized as a special character
    <?php
        if(!empty($errorMessage)){
            echo "alert('Please fix the following errors:\\n $errorMessage ');";
        } ?>
</script>
<?php
require '../view/footerinclude.php';
?>