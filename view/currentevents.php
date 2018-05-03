<!--
Authors: Breanna Greggs and Rebecca Bailey
Purpose: Allows users to view the events that have yet to happen such as
    tournaments or even weekly events like meeting or game nights
Links:
    link to site used for the suggestions layout: https://v4-alpha.getbootstrap.com/components/forms/
    link for the text area: https://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp
-->

<?php
$title = "Current Events"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

        <div class="index-template text-white" ><!-- template-div: div on the body that contains images, and the two sections for the different kinds of feeds-->
            <div class = "row"><!-- allow for grid layout to take place and organize things horizontally-->
                <!-- border across top-->
                <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

                <!-- start Events -->
                <div class = "col-6 offset-1 table_format">
                    <h1 class = "message_box_title">Events</h1>

                    <table class="text-white">
                        <thead><!--table header-->
                            <tr>
                                <th><h6>Event Name</h6></th>
                                <th><h6>Date</h6></th>
                                <th><h6>Time</h6></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--in order to generate the table data, we would have to go back and forth
                                between html and php so to make things simplilar we just add individual parts of php-->
                            <!-- here we start our php loop-->
                            <?php
                                $i=0;
                                foreach($results as $row){
                                    $i++;    //counter to change colors on rows
                            ?>
                                <!--the php in this tag will add the class evenRow/oddRow based on our counter in the above tag $i
                                    ***Bonus!! we are using a terinary to do so*** (conditional)? trueCase:falseCase-->
                                <tr class="<?php echo($i %2 ==0)? 'rowEven':'rowOdd'?>" >
                                    <!--using php we add the array values by using the column names that we
                                        want(CASE SENSITIVE) meaning we could import all info and only get
                                        specific items.    Also, we need the "echo" part so that we see the information
                                        bc html will not read our $row['columnName']. Forgetting the "echo" wont cause a syntax error but the text will be missing-->
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
                    </table>

                </div><!-- end Events -->

                <div class = "col-2 offset-1"><!-- start Suggestions message_box -->
                    <h1 class="message_box_title">Suggestions</h1>
                    <div class = "message_box">
                        <form class = "feed_side_space">
                            <input class = "form-control suggestion_item input_length" type = "text" placeholder="Fist Name">
                            <input class = "form-control suggestion_item input_length" type = "text" placeholder="Last Name">
                            <input class = "form-control suggestion_item input_length" type = "email" placeholder="email@eagle.clarion.edu">
                            <textarea class = "form-control suggestion_item input_length" rows = "7" placeholder="Comments/Suggestions"></textarea>
                            <input class = "form-control suggestion_item input_length" type = "submit" >
                        </form><!--end the form for suggestions-->
                    </div>
                </div><!-- end Suggestion message_box -->

            </div><!-- end row -->
        </div><!--end index-template-->


    </div><!-- /.container -->

    <?php
    require '../view/footerinclude.php';
    ?>


<!--<div class = "message_box"> <!-- News feed message_box div begin - separates the title from the text-->
<!--start event list -->
<!--       <ul class="feed_side_space">
           <li class = "feed">Moses's D&D campaign Mondays at 3:00 p.m. Watch the Twitter for schedule changes. </li>
           <li class = "feed">Theodore's D&D campaign Tuesday at 6:00 p.m. Watch the Twitter for schedule changes.</li>
           <li class = "feed">February 20th at 6:00 p.m. there will be a collaboration with ASIA for a GitHub seminar. Extra credit will be given by:
               Dr. Strausser, Dr. Childs, Dr. Kim, Dr. George, Dr. O'Donnell, Dr. Wyatt. Be sure to sign in so you get your extra credit while
               adding to you experience. Learn the basics of GitHub from volunteer Jerad Meterko! Please note: If you are currently in CIS 375,
               this will be an added bonus before you have to start your semester project. </li>
           <li class = "feed">Do you like to Smash? Do you prefer it on the game cube or wii? Well break
               out your lucky controller! TechFloor is holding a tournament! Come and compete and show off your skills!</li>
           <li class = "feed">Do you like to Pokemon? Do you have a 3DS? Well come and join TechFloor for their first ever Pokemon tournament!</li>
           <li class = "feed">Have you ever been on that sliver of health in your game but still survived? Well people are doing it for real!
               Come support them by playing games with us! This fall we will be hosting an event called One Life where you can contribute to a good cause
               while competing in Rocket League, Smash, and Mario Kart tournaments. We hope to see you there!</li>

       </ul> <!--end events list-->

<!--</div> <!-- end Events message box-->