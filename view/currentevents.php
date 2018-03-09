<!--
Authors: Breanna Greggs and Rebecca Bailey
Purpose: Allows users to view the events that have yet to happen such as
    tournaments or even weekly events like meeting or game nights
Links:
    link to site used for the suggestions layout: https://v4-alpha.getbootstrap.com/components/forms/
    link for the text area: https://www.w3schools.com/bootstrap/bootstrap_forms_inputs.asp
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/tfFavicon.png">

    <title>TechFloor's Events</title>

    <!-- JavaScript -->
    <!-- JQuery -->
    <script src="../js/jquery-3.1.1.js"></script>
    <!-- Custom JS -->
    <script src="../js/techfloorsite.js"></script>

    <!-- Bootstrap core CSS -->
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

        <div class="index-template" ><!-- template-div: div on the body that contains images, and the two sections for the different kinds of feeds-->
            <div class = "row"><!-- allow for grid layout to take place and organize things horizontally-->
                <!-- border across top-->
                <img class = "col-10 offset-1" src = "../images/temp.png" alt = "cool blue techy background"  >

                <div class = "col-6 offset-1"><!-- start Events -->
                    <h1 class = "message_box_title">Events</h1>
                    <div class = "message_box"> <!-- News feed message_box div begin - separates the title from the text-->

                        <ul class="feed_side_space"><!--start event list -->
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

                    </div> <!-- end Events message box-->
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

<!-- FOOTER START -->
<div id="tfFooter" class="align-bottom footer-template">
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