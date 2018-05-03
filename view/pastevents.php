<?php
$title = "Past Events"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template " >
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <!-- border across top-->
            <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

            <!--search area-->
            <div class = "detailForm">
                <h1>Search Events</h1>

                <div class = "formRow">
                    <label>Select an event type: </label>
                    <select id="eventTypeSelect">
                        <!--we need to rework our database so that instead of numbers for types we have actual words but for now we stuck with numbers-->
                        <option value = "None">Select the Type</option>
                        <option value = "Seminars">Seminars</option>
                        <option value = "Tournaments">Tournaments</option>
                        <option value="Social">Social</option>
                        <option value="Organizational">Organizational</option>
                    </select>
                    <input type = "button" onclick = "eventLookUp()" value="Search"/>
                </div>

            </div>
            <!--JS for button on event serach ***Becky***-->
            <script>
                function eventLookUp()
                {
                    document.location = "../controller/controller.php?action=ShowEventType&Type=" +  $("#eventTypeSelect").val();
                }
            </script>
            <!-- start Past Events table -->
            <div class = "col-6 offset-3 table_format">
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
                        <?php  $i=0; foreach($results as $row){
                            $i++
                        ?>
                            <!--the php in this tag will add the class evenRow/oddRow based on our counter in the above tag $i
                                ***Bonus!! we are using a terinary to do so*** (conditional)? trueCase:falseCase-->
                            <tr class="<?php echo($i %2 ==0)? 'rowEven':'rowOdd'?>" >
                                <!--using php we add the array values by using the column names that we
                                    want(CASE SENSITIVE) meaning we could import all info and only get
                                    specific items.    Also, we need the "echo" part so that we see the information
                                    bc html will not read our $row['columnName']. Forgetting the "echo" wont cause a syntax error but the text will be missing-->
                                <!-- td = table data -->
                                <td class="leftText">
                                    <a href="../controller/controller.php?action=ShowEvent&EventID=<?php echo $row['EventID'] ?>">
                                        <?php echo htmlspecialchars($row['EventName']) ?>
                                    </a>
                                </td>
                                <td><?php echo htmlspecialchars(toDisplayDate($row['Date'])) ?></td>
                                <td><?php echo htmlspecialchars($row['Time']) ?></td>
                            </tr>
                            <!--here is where we end our php loop-->
                        <?php   }   ?>

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
