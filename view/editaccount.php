<?php
$title = "$mode Account"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template">
    <div class = "row table_format"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <div class = "col-6 offset-3 "><!-- start Suggestions message_box -->
            <h1 class="message_box_title"><?php echo htmlspecialchars($mode) ?> Your TechFloor Account</h1>
            <div class = "message_box">
                <!--adding "required" makes it required on the client side (html 5)-->
                <form enctype="multipart/form-data" action="../controller/controller.php?action=AccountAddEdit" method = "post" class="feed_side_space row">

                    <!-- will have hidden types of memberID and mode to determine if we are
                    editing currently or working on adding a new member -->
                    <input type="hidden" name="MemberID" value="<?php echo $memberID ?>" />
                    <input type="hidden" name="Mode" value="<?php echo htmlspecialchars($mode) ?>" />

                    <?php if($row['MemberImagePath']!= ""){ ?>
                        <div id="memberImage">
                            <img src="<?php echo htmlspecialchars($row['MemberImagePath']) ?> ?foolcache=<?php echo time() ?>" alt="Member Image"
                                 height="220" width="220" >
                        </div>
                    <?php } ?>
                    <label for="fName">First Name:<span class="requiredFormInfo">*</span></label>
                    <input name = "fName" type = "text" value ="<?php echo htmlspecialchars($firstName) ?>" placeholder="First Name"
                          required class = "form-control suggestion_item input_length" maxlength="30" autofocus>
                    <label for="lName">Last Name:<span class="requiredFormInfo">*</span></label>
                    <input name = "lName" type = "text" value ="<?php echo htmlspecialchars($lastName) ?>" placeholder="Last Name"
                           required class = "form-control suggestion_item input_length" maxlength="30">
                    <label for="email">Clarion Email Address:<span class="requiredFormInfo">*</span></label>
                    <input name = "email" type = "email" value ="<?php echo htmlspecialchars($email) ?>" placeholder="email@eagle.clarion.edu"
                           required class = "form-control suggestion_item input_length" maxlength="50">
                    <label for="classStanding">Select your Class Standing:<span class="requiredFormInfo">*</span></label>
                    <select name="classStanding" class = "form-control" value ="<?php echo $classStanding ?>" >
                        <option value="">Select...</option>
                        <option value="Freshman"<?php if ($classStanding == 'Freshman') echo ' selected="selected"'; ?>>Freshman</option>
                        <option value="Sophomore"<?php if ($classStanding == 'Sophomore') echo ' selected="selected"'; ?>>Sophomore</option>
                        <option value="Junior"<?php if ($classStanding == 'Junior') echo ' selected="selected"'; ?>>Junior</option>
                        <option value="Senior"<?php if ($classStanding == 'Senior') echo ' selected="selected"'; ?>>Senior</option>
                        <option value="Graduate"<?php if ($classStanding == 'Graduate') echo ' selected="selected"'; ?>>Graduate</option>
                        <option value="Adult?"<?php if ($classStanding == 'Adult?') echo ' selected="selected"'; ?>>Adult?</option>
                    </select>
                    <label for="memberIcon">Choose your Profile Image:</label>
                    <input name = "memberIcon" type = "file" class="input_length"/>
                    <?php if($row['Image'] != ""){ ?>
                        <label for="MemberImageDelete">Delete Selected Image:</label>
                        <input type="checkbox" name="memberDeleteImage" id="MemberImageDelete">
                    <?php } ?>
                    <label for="describe">Describe your interests:</label>
                    <textarea name="memberDesc" rows = 5 class = "form-control suggestion_item input_length"><?php echo htmlspecialchars($description) ?></textarea>
                    <label for="extraEmails">Receive our Event Information:</label>
                    <input name = "extraEmails" type = "checkbox" <?php if($extraEmails == 'Y') echo 'checked' ?> class = "form-control suggestion_item input_length" >
                    <input type = "submit" value = "<?php echo htmlspecialchars($mode) ?> Account" class = "form-control suggestion_item input_length"  >
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