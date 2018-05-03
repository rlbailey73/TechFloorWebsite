<?php
$title = "Individual Member"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

    <div class="index-template" >
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <div class = "col-6 offset-3 detailForm"><!-- start member message_box -->
                <h3 class="message_box_title">Individual Member</h3>

                <div class="formRow leftText">
                    <label>First Name: </label>
                    <?php echo htmlspecialchars($row['FirstName']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Last Name: </label>
                    <?php echo htmlspecialchars($row['LastName']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Email: </label>
                    <?php echo htmlspecialchars($row['Email']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Class Standing: </label>
                    <?php echo htmlspecialchars($row['ClassStanding']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Position: </label>
                    <?php echo htmlspecialchars($row['Position']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Description: </label>
                    <?php echo htmlspecialchars($row['Description']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Extra Email's: </label>
                    <?php echo htmlspecialchars($row['ExtraEmails']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Member Since: </label>
                    <?php echo htmlspecialchars(toDisplayDate($row['MemberSince'])) ?>
                </div>
                <div class="formRow leftText">
                    <label>Profile Image: </label>
                    <?php echo $row['Image'] ?>
                    <?php if($row['MemberImagePath']!= ""){ ?>
                    <div id="memberImage">
                        <img src="<?php echo htmlspecialchars($row['MemberImagePath']) ?>" alt="Member Image"
                             height="220" width="220" >
                    </div>
                    <?php } ?>
                </div>

                <!-- will be edit buttons for member -->
                <div class="formRow">
                    <input type="button" name="AccountEdit" value="Edit Information" id="accountEdit" onclick="document.location='../controller/controller.php?action=AccountEdit&MemberID=<?php echo $row['MemberID'] ?>';" />
                </div>
                <!-- Delete Button for admin -->
                <div class="formRow" style="margin: 50px;">
                    <input type="button" name="AccountDelete" value="Delete Account" id="accountDelete" onclick="document.location='../controller/controller.php?action=AccountDeleteOne&MemberID=<?php echo $row['MemberID'] ?>';" />
                </div>

            </div><!-- end member message_box -->

        </div><!-- end row -->
    </div><!--end index-template-->


    </div><!-- /.container -->

<?php
require '../view/footerinclude.php';
?>