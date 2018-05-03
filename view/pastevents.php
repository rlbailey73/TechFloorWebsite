<?php
$title = "Past Events"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template " >
    <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <!--search area-->
        <div class = " detailForm col-5 offset-1">
            <h1 class="message_box_title">Search Events</h1>

            <!--search for a specific type of event-->
            <div class = "message_box formRow">
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

                <!--search for ongoing events-->
                <div class="formRow">
                    <a href="../controller/controller.php?action=ListEvents&EventSearchType=Ongoing"><h3 class="message_box_title">Click for the ongoing events!</h3></a>
                </div>

                <!--search for past events-->
                <div class="formRow">
                    <a href="../controller/controller.php?action=ListEvents&EventSearchType=Past"><h3 class="message_box_title">Click for the past events!</h3></a>
                </div>

                <!--search for specific criteria across all columns-->
                <div class="formRow">
                    <label>Search Event Names:</label>
                    <input type ="text" id="Criteria"/>
                    <input type="button" onclick="generalEventSearch()" value="Search" />
                </div>

                <!--search for ongoing events-->
                <div class="formRow">
                    <a href="../controller/controller.php?action=ListEvents&EventSearchType=None"><h3 class="message_box_title">Click for all events!</h3></a>
                </div>
            </div> <!--end Message box formrow tag-->
        </div>

        <!-- start Events table -->
        <div class = "col-4 offset-1 table_format">
            <h1 class="message_box_title"><?php echo $eventTableTitle ?></h1>

            <!-- plan to start form for past events here -->
            <table class="text-white">
                <thead>
                    <!-- tr = table row -->
                    <tr>
                        <!-- th = table head -->
                        <th><h5><u>Event Name</u></h5></th>
                        <th><h5><u>Date</u></h5></th>
                        <th><h5><u>Time</u></h5></th>
                    </tr>
                </thead>
                <tbody>
                    <!--in order to generate the table data, we would have to go back and forth
                            between html and php so to make things simplilar we just add individual parts of php-->
                    <!-- here we start our php loop-->
                    <?php  $i=0; foreach($eventList as $row){
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
        </div><!-- end Past Events table -->
    </div><!-- end row -->

</div><!-- /.container -->

<?php
require '../view/footerinclude.php';
?>

<!--JS for button on event serach ***Becky***-->
<script>
    function eventLookUp()
    {
        document.location = "../controller/controller.php?action=ListEvents&EventSearchType=TypeOfEvent&Type=" +  $("#eventTypeSelect").val();
    }

    function generalEventSearch()
    {
        //the encode show pass in exactly what the user types
        document.location = "../controller/controller.php?action=ListEvents&EventSearchType=General&Criteria=" + $('#Criteria').val();
    }
</script>