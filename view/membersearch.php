<?php
$title = "Member Search"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template" >
    <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <!-- Search -->
        <div class = "col-4 offset-1 detailForm">
            <h1 class="message_box_title">Search Members</h1>

            <div class="message_box formRow">
                <label>Select a Member:</label>
                <select id="MemberSelect">
                    <option value="0">Choose a Member</option>

                    <?php foreach($memList as $row) { ?>
                        <option value="<?php echo $row['MemberID'] ?>"><?php echo $row['FirstName']." ".$row['LastName'] ?></option>
                    <?php } ?>

                </select>
                <input type="button" onclick="memberLookUp()" value="Search! :D" />

                <!--search part of words-->
                <div class="formRow">
                    <label>Search Criteria:</label>
                    <input type ="text" id="Criteria"/>
                    <input type="button" onclick="generalSearch()" value="General Search" />
                </div>
                <!--find those that are part of the board-->
                <div class="formRow">
                    <a href="../controller/controller.php?action=ListMembers&ListType=Position"><h3 class="message_box_title">Members by Organization Position</h3></a>
                </div>
                <!--find those that are part of the newsletter list-->
                <div class="formRow">
                    <a href="../controller/controller.php?action=ListMembers&ListType=NewsLetterList"><h3 class="message_box_title">News Letter List</h3></a>
                </div>
            </div><!--end Message box formrow tag-->
        </div><!--end search-->

        <!-- Member List View -->
        <div class = "col-5 offset-1 table_format">
            <h1 class="message_box_title"><?php echo $memberTableTitle ?></h1>

            <table class="text-white">
                <thead>
                <!-- tr = table row -->
                <tr>
                    <!-- th = table head -->
                    <th><h6><u>First Name</u></h6></th>
                    <th><h6><u>Last Name</u></h6></th>
                    <th><h6><u>Position</u></h6></th>
                    <th><h6><u>Newsletter</u></h6></th>
                    <th><h6><u>Member Since</u></h6></th>
                </tr>
                </thead>
                <tbody>
                <!--in order to generate the table data, we would have to go back and forth
                        between html and php so to make things simpler we just add individual parts of php-->
                <!-- here we start our php loop
                it then switches back to html to -->
                <?php  $i=0; foreach($memList as $row){
                    $i++;
                    ?>
                    <!--the php in this tag will add the class evenRow/oddRow based on our counter in the above tag $i
                        ***Bonus!! we are using a terinary to do so*** (conditional)? trueCase:falseCase-->
                    <tr class="<?php echo($i %2 ==0)? 'rowEven':'rowOdd'?>" >
                        <!--using php we add the array values by using the column names that we
                            want(CASE SENSITIVE) meaning we could import all info and only get
                            specific items.    Also, we need the "echo" part so that we see the information
                            bc html will not read our $row['columnName']. Forgetting the "echo" wont cause a syntax error but the text will be missing-->
                        <td class="leftText">
                            <a href="../controller/controller.php?action=ViewMember&MemberID=<?php echo $row['MemberID'] ?>" >
                                <?php echo htmlspecialchars($row['FirstName']) ?>
                            </a>
                        </td>
                        <td class="leftText"><?php echo htmlspecialchars($row['LastName']) ?></td>
                        <td class="leftText"><?php echo htmlspecialchars($row['Position']) ?></td>
                        <td><?php echo htmlspecialchars($row['ExtraEmails']) ?></td>
                        <td><?php echo htmlspecialchars(toDisplayDate($row['MemberSince'])) ?></td>
                    </tr>
                    <!--here is where we end our php loop
                    in between the two tags is the line that gets repeated over and over again-->
                <?php   }   ?>
                </tbody>
                <tfoot>

                </tfoot>
            </table>

        </div><!-- end memberview -->
    </div><!-- end row -->
</div><!--end index-template-->

<script>
    function memberLookUp(){
        document.location = "../controller/controller.php?action=ViewMember&MemberID=" + $('#MemberSelect').val();
    }

    function generalSearch()
    {
        //the encode show pass in exactly what the user types
        document.location = "../controller/controller.php?action=ListMembers&ListType=GeneralSearch&Criteria=" + encodeURIComponent($('#Criteria').val());
    }

</script>
<?php
require '../view/footerinclude.php';
?>