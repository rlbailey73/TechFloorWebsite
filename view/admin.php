<!--
Authors: Breanna Greggs and Rebecca Bailey
Purpose: Admin page is meant to provide people with admin priviledges to
    easily edit items on the other pages
Links:
    For the buttons: https://v4-alpha.getbootstrap.com/components/buttons/
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/tfFavicon.png">

    <title>TechFloor Head Quarters</title><!--hint hint *cough cough* give us a bunker thanks-->

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="../js/jquery-3.1.1.js"></script>
    <!-- Custom JS -->
    <script src="../js/techfloorsite.js"></script>

    <!-- Bootstrap core CSS  and  our custom CSS-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/custom.css">

</head>

<body>

    <div class="container-fluid "><!--according to the j-man adding "fluid" adds for a smoother resizing-->

        <nav>
            <?php
            include './navbar.html';
            ?>
        </nav>

        <div class="index-template" >
            <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

                <!-- border across top-->
                <img class = "col-10 offset-1" src = "../images/tfBackground.png" alt = "cool blue techy background"  >

                <!--start HOME_PAGE admin-->
                <div class = "col-6 offset-3">
                    <h1 class="message_box_title">Edit the Home Page</h1>
                    <!--upload the news-->
                    <div class = "message_box ">
                        <h4>Upload the News</h4>
                        <form enctype="multipart/form-data" action="../php/uploadednews.php" method = "post" class="feed_side_space row">
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
                        <form enctype="multipart/form-data" action="../php/uploadedimages.php" method = "post" class="feed_side_space row">
                            Send this file:
                            <input name = "userpic" type = "file" class="input_length"/>
                            <input type = "submit" value="Send File" class = "form-control"/>
                        </form><!--end news upload-->
                    </div>
                </div><!-- end PICTURES edits -->

                <!--start QUOTES admin-->
                <div class = "col-6 offset-3">
                    <h1 class="message_box_title">Add QUOTES</h1>
                    <!--upload the QUOTES-->
                    <div class = "message_box ">
                        <h4>Upload Your QUOTES</h4>
                        <form enctype="multipart/form-data" action="../php/upload_quotes.php" method = "post" class="feed_side_space row">
                            Select a QUOTES FILE to upload:
                            <input name = "userfile" type = "file" class="input_length"/>
                            <input type = "submit" value="Send File" class = "form-control"/>
                        </form><!--end news upload-->
                    </div>
                </div><!-- end PICTURES edits -->

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

                <div class = "col-6 offset-3"><!-- start admin event -->
                    <h1 class = "message_box_title">Event Additions</h1>
                    <div class = "message_box">
                        <h4>Enter information of the event to be added:</h4>
                        <form class = "feed_side_space row">
                            <input class = "form-control suggestion_item input_length" type = "text" placeholder="First Name">
                            <input class = "form-control suggestion_item input_length button_space" type="date" placeholder="mm/dd/yy">
                            <input class = "form-control suggestion_item input_length button_space" type="time" placeholder="Enter Start Time">
                            <textarea class = "form-control suggestion_item input_length" rows = "7" placeholder="Description"></textarea>
                            <button type="button" class="btn btn-block button_space suggestion_item">Add Event to CURRENT EVENTS</button>
                        </form>
                    </div>

                </div><!-- end Twitter Feed message_box -->

            </div><!-- end row -->
        </div><!--end index-template-->

    </div><!-- /.container -->

<!-- FOOTER START -->
    <footer>
        <?php
        include './footer.php';
        ?>
    </footer>
<!--<div id="tfFooter" class="align-bottom footer-template">
    <script>
        window.onload = displayFooter();
    </script>
</div> <!-- FOOTER END -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Commenting out Slim for now because it causes issues with JQuery, hopefully we can get rid of it for the final version
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://maxcdn.bootstrapcdn.com/js/ie10-viewport-bug-workaround.js"></script>
<!-- Holder.js for placeholder images -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
</body>
</html>
