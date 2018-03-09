<!--
Authors: Rebecca Bailey and Brenna Greggs
Purpose: This is the main page people will first see and the one they will be redirected to
        upon clicking on the logo. It contains a news feed of any interesting items and the
        twitter feed
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/tfFavicon.png">

    <title>TechFloor Central</title>

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

    <div class="container-fluid "><!--allows for a smoother resizing-->

        <nav>
            <?php
            include './navbar.html';
            ?>
        </nav>

        <div class="index-template"> <!-- template-div: div on the body that contains images, and the two sections for the different kinds of feeds-->

            <div class = "row"><!-- allow for grid layout to take place and organize things horizontally-->
                <!-- border across top-->
                <img class = "col-10 offset-1" src = "../images/temp.png" alt = "cool blue techy background"  >

                <!-- start News Feed section -->
                <div class = "col-5 offset-1">
                    <h1 class="message_box_title">News Feed</h1>
                    <!--This is the content area of the news feed which allows for a scroll bar-->
                    <div class = "message_box scroll">
                        <p class="lead">
                            <ul class="feed_side_space">
                                <li class = "feed">D&D will be cancelled this week but will continue next week</li>
                                <li class = "feed">There will be $100 for everyone who attends the TechFloor courtesy of Doctor Strausser!</li>
                                <li class = "feed">February 20th at 6:00 p.m. there will be a collaboration with ASIA for a GitHub seminar. Extra credit will be given by:
                                  Dr. Strausser, Dr. Childs, Dr. Kim, Dr. George, Dr. O'Donnell, Dr. Wyatt. Be sure to sign in so you get your extra credit while
                                  adding to you experience. Learn the basics of GitHub from volunteer Jerad Meterko! Please note: If you are currently in CIS 375,
                                  this will be an added bonus before you have to start your semester project. </li>
                                <li class = "feed">Do you like to Smash? Do you prefer it on the game cube or wii? Well break
                                  out your lucky controller! TechFloor is holding a tournament! Come and compete and show off your skills!</li>
                                <li class = "feed">Do you like to Pokemon? Do you have a 3DS? Well come and join TechFloor for their first ever Pokemon tournament!</li>
                            </ul>
                        </p><!--end News Feed paragraph-->
                    </div><!-- end News Feed message_box with scroll -->
                </div><!--end of News Feed section-->

                <!-- start Twitter Feed section -->
                <div class = "col-4 offset-1">
                    <h1 class = "message_box_title">Twitter</h1>
                    <!--This is the content area of the twitter feed-->
                    <div class = "message_box">
                        <p class="lead">
                            <strong>@TechFloor</strong>
                            <ul class="feed_side_space">
                                <li class = "feed">Come chill at TechFloor instead of chilling in the cold! We are open!</li>
                                <li class = "feed">TechFloor is open!</li>
                                <li class = "feed">There are meetings tonight! Game night is immediately afterwards! Come hang out with us!</li>
                            </ul>
                        </p><!--end Twitter Feed paragraph-->
                    </div><!-- end Twitter Feed content area-->
                </div><!-- end Twitter Feed section-->
            </div><!-- end row -->
        </div><!--end index-template div-->
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
