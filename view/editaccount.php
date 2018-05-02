<?php
$title = "$mode Account"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template">
    <div class = "row table_format"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <div class = "col-6 offset-3 "><!-- start Suggestions message_box -->
            <h1 class="message_box_title"><?php echo $mode ?> Your TechFloor Account</h1>
            <div class = "message_box">
                <!--adding "required" makes it required on the client side (html 5)-->
                <form enctype="multipart/form-data" action="../controller/controller.php?action=AccountAddEdit" method = "post" class="feed_side_space row">

                    <!-- will have hidden types of memberID and mode to determine if we are
                    editing currently or working on adding a new member -->
                    <input type="hidden" name="MemberID" value="<?php echo $memberID ?>" />
                    <input type="hidden" name="Mode" value="<?php echo $mode ?>" />

                    <label for="fName">First Name:<span class="requiredFormInfo">*</span></label>
                    <input name = "fName" type = "text" value ="<?php echo $firstName ?>" placeholder="First Name"
                          required class = "form-control suggestion_item input_length" maxlength="30" autofocus>
                    <label for="lName">Last Name:<span class="requiredFormInfo">*</span></label>
                    <input name = "lName" type = "text" value ="<?php echo $lastName ?>" placeholder="Last Name"
                           required class = "form-control suggestion_item input_length" maxlength="30">
                    <label for="email">Clarion Email Address:<span class="requiredFormInfo">*</span></label>
                    <input name = "email" type = "email" value ="<?php echo $email ?>" placeholder="email@eagle.clarion.edu"
                           required class = "form-control suggestion_item input_length" maxlength="50">
                    <label for="classStanding">Select your Class Standing:<span class="requiredFormInfo">*</span></label>
                    <select name="classStanding" class = "form-control" value ="<?php echo $classStanding ?>" >
                        <option value="">Select...</option>
                        <option value="Freshman">Freshman</option>
                        <option value="Sophomore">Sophomore</option>
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Graduate">Graduate</option>
                        <option value="Adult?">Adult?</option>
                    </select>
                    <label for="memberIcon">Choose your Profile Image:</label>
                    <input name = "memberIcon" type = "file" class="input_length"/>
                    <label for="describe">Describe your interests:</label>
                    <textarea name="memberDesc" rows = 5 class = "form-control suggestion_item input_length"><?php echo $description ?></textarea>
                    <label for="extraEmails">Receive our Event Information:</label>
                    <input name = "extraEmails" type = "checkbox" <?php if($extraEmails == 'Y') echo 'checked' ?> class = "form-control suggestion_item input_length" >
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