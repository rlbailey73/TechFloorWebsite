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
                    <?php echo $row['FirstName'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Last Name: </label>
                    <?php echo $row['LastName'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Email: </label>
                    <?php echo $row['Email'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Class Standing: </label>
                    <?php echo $row['ClassStanding'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Position: </label>
                    <?php echo $row['Position'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Profile Image: </label>
                    <?php echo $row['Image'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Description: </label>
                    <?php echo $row['Description'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Extra Email's: </label>
                    <?php echo $row['ExtraEmail'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Member Since: </label>
                    <?php echo toDisplayDate($row['MemberSince']) ?>
                </div>
            </div><!-- end member message_box -->

        </div><!-- end row -->
    </div><!--end index-template-->


    </div><!-- /.container -->

<?php
require '../view/footerinclude.php';
?>