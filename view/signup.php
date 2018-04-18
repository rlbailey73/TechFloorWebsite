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
                    <input name = "fName" type = "text" placeholder="First Name"  required class = "form-control suggestion_item input_length" >
                    <input name = "lName" type = "text" placeholder="Last Name"  required class = "form-control suggestion_item input_length" >
                    <input name = "email"type = "email" placeholder="email@eagle.clarion.edu"  required class = "form-control suggestion_item input_length" >
                    <input type = "submit" value = "Join Now!" class = "form-control suggestion_item input_length"  >
                </form><!--end the form for suggestions-->
            </div>
        </div><!-- end Suggestion message_box -->

            <!-- Member List View -->
            <table class="text-white">
                <thead>
                <!-- tr = table row -->
                <tr>
                    <!-- th = table head -->
                    <th><h6>First Name</h6></th>
                    <th><h6>Last Name</h6></th>
                    <th><h6>Position</h6></th>
                    <th><h6>Member Since</h6></th>
                </tr>
                </thead>
                <tbody>
                <!--in order to generate the table data, we would have to go back and forth
                        between html and php so to make things simpler we just add individual parts of php-->
                <!-- here we start our php loop
                it then switches back to html to -->
                <?php   foreach($results as $row){
                    $i++
                    ?>
                    <!--the php in this tag will add the class evenRow/oddRow based on our counter in the above tag $i
                        ***Bonus!! we are using a terinary to do so*** (conditional)? trueCase:falseCase-->
                    <tr class="<?php echo($i %2 ==0)? 'evenRow':'oddRow'?>" >
                        <!--using php we add the array values by using the column names that we
                            want(CASE SENSITIVE) meaning we could import all info and only get
                            specific items.    Also, we need the "echo" part so that we see the information
                            bc html will not read our $row['columnName']. Forgetting the "echo" wont cause a syntax error but the text will be missing-->
                        <td class="leftText">
                            <a href="../controller/controller.php?action=ViewMemberList&MemberID=<?php echo $row['MemberID'] ?>">
                                <?php echo $row['FirstName'] ?>
                            </a>
                        </td>
                        <td><?php echo $row['LastName'] ?></td>
                        <td><?php echo $row['Status'] ?></td>
                        <td><?php echo $row['Member Since'] ?></td>
                    </tr>
                    <!--here is where we end our php loop
                    in between the two tags is the line that gets repeated over and over again-->
                <?php   }   ?>
                <tr>
                    <!-- td = table data -->
                    <td>Smash Tourn</td>
                    <td>2/28/2018</td>
                    <td>6:00PM</td>
                    <td>6:00PM</td>
                </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div><!--end index-template-->
<?php
require '../view/footerinclude.php';
?>;