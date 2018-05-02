<?php
$title = "Display Event"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template text-white" ><!-- template-div: div on the body that contains images, and the two sections for the different kinds of feeds-->
    <div class = "row"><!-- allow for grid layout to take place and organize things horizontally-->
        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

            <div class=" col-8 offset-2 detailForm">

                <div class="formRow leftText">
                    <label>Event Name: </label>
                    <?php echo $row['EventName'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Date: </label>
                    <?php echo toDisplayDate($row['Date']) ?>
                </div>
                <div class="formRow leftText">
                    <label>Time: </label>
                    <?php echo $row['Time'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Description: </label>
                    <?php echo $row['Description'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Type: </label>
                    <?php echo $row['Type'] ?>
                </div>
                <div class="formRow leftText">
                    <label>Members Signed up: </label>
                    <?php echo $row['MemberSignup'] ?>
                </div>

                <div class="formRow">
                    <input type="button" name="eventEdit" value="Edit"
                           onclick="document.location='../controller/controller.php?action=EditEvent&EventID=<?php echo $row['EventID'] ?>';"/>
                </div>
                <div class="formRow">
                    <input type="button" name="eventDelete" value="Delete"
                           onclick="document.location='../controller/controller.php?action=DeleteEvent&EventID=<?php echo $row['EventID'] ?>';"/>
                </div>
            </div><!--end detailForm-->

    </div><!-- end row -->
</div><!--end index-template-->

<?php
require '../view/footerinclude.php';
?>