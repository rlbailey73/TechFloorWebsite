<!--
Authors: Breanna Greggs and Rebecca Bailey
Purpose: Admin page is meant to provide people with admin priviledges to
    easily edit items on the other pages
Links:
    For the buttons: https://v4-alpha.getbootstrap.com/components/buttons/
-->
<?php
$title ="Admin";
require '../view/headerinclude.php';
?>

        <div class="index-template" >
            <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

                <!-- border across top-->
                <img class = "col-10 offset-1" src = "../images/Functional/tfBackground.png" alt = "cool blue techy background"  >

                <!--start HOME_PAGE admin-->
                <div class = "col-6 offset-3">
                    <h1 class="message_box_title">Edit the Home Page</h1>
                    <!--upload the news-->
                    <div class = "message_box ">
                        <h4>Upload the News</h4>
                        <form enctype="multipart/form-data" action="../controller/controller.php?action=UploadNews" method = "post" class="feed_side_space row">
                            Send this file:
                            <input name = "userfile" type = "file" class="input_length"/>
                            <input type = "submit" value="Send File" class = "form-control"/>
                        </form><!--end news upload-->
                    </div>
                </div><!-- end HOME edits -->

                <!--start PICTURES admin-->
                <div class = "col-6 offset-3">
                    <h1 class="message_box_title">Add Images</h1>
                    <!--upload the news-->
                    <div class = "message_box ">
                        <h4>Upload Your Pictures</h4>
                        <form enctype="multipart/form-data" action="../controller/controller.php?action=UploadPictures" method = "post" class="feed_side_space row">
                            Send this file:
                            <select name="picFolder" class = "form-control">
                                <option value="">Select...</option>
                                <option value="L">Techfloor Life</option>
                                <option value="F">Functional</option>
                            </select>
                            <input name = "userpic" type = "file" class="input_length"/>
                            <input type = "submit" value="Send File" class = "form-control"/>
                        </form><!--end news upload-->
                        <!--this outpus the files already uploaded in the images folder--> <!--BEcky does this need to go through controller-->
                        <p><u>The current TechfloorLife files are:</u>  <br>
                            <?php
                                $dir = "../images/TechfloorLife/";
                                //open the directory specified and read the content
                                if(is_dir($dir))
                                {
                                    if($dh = opendir($dir))
                                    {
                                        while(($file = readdir($dh)) !== false)
                                        {
                                            if($file != "." && $file!="..")
                                            {
                                                echo $file . "<br>";
                                            }
                                        }
                                    }
                                }
                            ?>
                            <u>The current Functional files are:</u>  <br>
                            <?php
                            $dir = "../images/Functional/";
                            //open the directory specified and read the content
                            if(is_dir($dir))
                            {
                                if($dh = opendir($dir))
                                {
                                    while(($file = readdir($dh)) !== false)
                                    {
                                        if($file != "." && $file!="..")
                                        {
                                            echo $file . "<br>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div><!-- end PICTURES edits -->

                <!--start QUOTES admin-->
                <div class = "col-6 offset-3">
                    <h1 class="message_box_title">Add QUOTES</h1>
                    <!--upload the QUOTES-->
                    <div class = "message_box ">
                        <h4>Upload Your QUOTES</h4>
                        <form enctype="multipart/form-data" action="../controller/controller.php?action=UploadQuotes" method = "post" class="feed_side_space row">
                            Select a QUOTES FILE to upload:
                            <input name = "quotefile" type = "file" class="input_length"/>
                            <input type = "submit" value="Send File" class = "form-control"/>
                        </form><!--end QUOTES upload-->
                    </div>
                </div><!-- end QUOTES edits -->

                <!--SEND EMAILS-->
                <div class = "col-6 offset-3">
                    <h1 class = "message_box_title">Send Emails</h1>
                    <div class = "message_box">
                        <!--we will need code to upload message here-->
                        <form enctype="multipart/form-data" action="../controller/controller.php?action=SendEmails" method="post" class = "feed row">
                            <input type="submit" value="Email uploaded files" class ="form-control"/>
                        </form>
                    </div>
                </div><!--end of sending emails-->

                <!-- start ABOUT_PAGE admin -->
                <div class = "col-6 offset-3">
                    <h1 class="message_box_title">Edit the About Page</h1>
                    <!--description of organization-->
                    <div class = "message_box ">
                        <h4>Edit the description</h4>
                        <form class="feed_side_space row">
                            <textarea class = "form-control suggestion_item input_length" rows = "10">
                            Clarion University TechFloor is a recognized student organization where we do homework,
                            work with computers, program, and play video games. We run various community service
                            events every year, which can include seminars, programming contests, and video game
                            tournaments. We also offer tutoring and general guidance with various CIS courses.(We'll
                            even try to help you with your personal computers!)

                            Meetings are held every Monday at 7:30 p.m. in our room in Ralston Hall. See the daily schedule
                            and keep an eye on the Twitter feed for updates on when we are open.
                            </textarea>
                            <button type="button" class="btn btn-block button_space form-control suggestion_item input_length">Save Changes to ABOUT</button>
                        </form><!--end about info paragraph-->
                    </div>

                    <!--Board Member edits-->
                    <div class = "message_box">
                        <h4>Change the board members</h4>
                        <form class="feed_side_space row">
                            <select class = " form-control suggestion_item">
                                <option>---Select Position to Edit---</option>
                                <option>President</option>
                                <option>Vice President</option>
                                <option>Treasurer</option>
                                <option>Secretary</option>
                                <option>Tech Manager</option>
                                <option>Public Relations</option>
                                <option>Community Service Chair</option>
                            </select>

                            <label for="mem_name" class="suggestion_item">Member name:</label>
                            <input class = "form-control suggestion_item " id="mem_name" type = "text">
                            <label for="mem_email" class="suggestion_item">Member email:</label>
                            <input  class = "form-control suggestion_item" id = "mem_email" type = "email">
                            <label for="mem_about" class="suggestion_item">About the member:</label>
                            <textarea class="form-control suggestion_item" id="mem_about" rows="3"></textarea>

                            <button type="button" class="btn btn-block button_space form-control suggestion_item">Save Board Member changes</button>
                        </form><!--end about info paragraph-->
                    </div><!--end Board Members edits-->

                </div><!-- end ABOUT edits -->

                <!-- start admin events -->
                <div class = "col-6 offset-3">
                    <h1 class = "message_box_title">Event Additions</h1>
                    <div class = "message_box">
                        <h4>Enter information of the event to be added:</h4>
                        <form enctype="multipart/form-data" action="../controller/controller.php?action=CreateEvent" method = "post" class="feed_side_space row">
                            <input name="eventName" type = "text" placeholder="Name of Event" class = "form-control suggestion_item input_length" >
                            <input name="eventDate" type="date" placeholder="mm/dd/yy" class = "form-control suggestion_item input_length button_space" >
                            <input name="eventTime" type="time" placeholder="Enter Start Time" class = "form-control suggestion_item input_length button_space" >
                            <textarea name="eventDesc" rows = "7" placeholder="Description" class = "form-control suggestion_item input_length" ></textarea>
                            <select name = "eventType">
                                <option value = "None">Select the Type</option>
                                <option value = "Seminars">Seminars</option>
                                <option value = "Tournaments">Tournaments</option>
                                <option value="Social">Social</option>
                                <option value="Organizational">Organizational</option>
                            </select>
                            <button type="submit" class="btn btn-block button_space suggestion_item">Add Event to CURRENT EVENTS</button>
                        </form>
                    </div>

                </div><!-- end Twitter Feed message_box -->

            </div><!-- end row -->
        </div><!--end index-template-->

    <?php
    require '../view/footerinclude.php';
    ?>
