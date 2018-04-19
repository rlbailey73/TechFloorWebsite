<?php
$title = "Member Search"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template" >
    <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <div class = "col-6 offset-3 detailForm"><!-- start message_box -->
            <h1 class="message_box_title">Search Members</h1>

            <div class="formRow">
                <label>Select a Member:</label>
                <select id="MemberSelect">
                    <option value="0">Choose a Member</option>

                    <?php foreach($memList as $row) { ?>
                        <option value="<?php echo $row['MemberID'] ?>"><?php echo $row['FirstName']." ".$row['LastName'] ?></option>
                    <?php } ?>

                </select>
                <input type="button" onclick="memberLookUp()" value="Search! :D" />
            </div>
            <div class="formRow">
                <a href="../controller/controller.php?action="><h1 class="message_box_title">Members by Organization Position</h1></a>
            </div>
            <div class="formRow">
                <a href="../controller/controller.php?action="><h1 class="message_box_title">Member Since.. List</h1></a>
            </div>
        </div><!-- end message_box -->
    </div><!-- end row -->
</div><!--end index-template-->

<script>
    function memberLookUp(){
        document.location = "../controller/controller.php?action=ViewMember&MemberID=" + $('#MemberSelect').val();
    }
</script>
<?php
require '../view/footerinclude.php';
?>