<?php
$title = "Past Events"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template" >
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <!-- border across top-->
            <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

            <div class = "col-6 offset-3 table_format"><!-- start Past Events message_box -->
                <h1 class="message_box_title">Past Events</h1>

                <!-- plan to start form for past events here -->
                <table class="text-white">
                    <thead>
                        <!-- tr = table row -->
                        <tr>
                            <!-- th = table head -->
                            <th><h6>Event Name</h6></th>
                            <th><h6>Date</h6></th>
                            <th><h6>Time</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--in order to generate the table data, we would have to go back and forth
                                between html and php so to make things simplilar we just add individual parts of php-->
                        <!-- here we start our php loop-->
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
                                    <a href="../controller/controller.php?action=ShowEvent&EventId=<?php echo $row['EventID'] ?>">
                                        <?php echo $row['EventName'] ?>
                                    </a>
                                </td>
                                <td><?php echo toDisplayDate($row['Date']) ?></td>
                                <td><?php echo $row['Time'] ?></td>
                            </tr>
                            <!--here is where we end our php loop-->
                        <?php   }   ?>
                        <tr>
                            <!-- td = table data -->
                            <td>Smash Tourn</td>
                            <td>2/28/2018</td>
                            <td>6:00PM</td>
                        </tr>
                        <tr>
                            <!-- td = table data -->
                            <td>GitHub Seminar</td>
                            <td>2/05/2018</td>
                            <td>6:30PM</td>
                        </tr>
                        <tr>
                            <!-- td = table data -->
                            <td>Open House</td>
                            <td>9/08/2017</td>
                            <td>5:00PM</td>
                        </tr>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div><!-- end Past Events message_box -->
        </div><!-- end row -->

</div><!-- /.container -->

<?php
require '../view/footerinclude.php';
?>
