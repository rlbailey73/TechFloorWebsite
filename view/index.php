<!--
Authors: Rebecca Bailey and Brenna Greggs
Purpose: This is the main page people will first see and the one they will be redirected to
        upon clicking on the logo. It contains a news feed of any interesting items and the
        twitter feed
-->

<?php
    require './headerinclude.php';
    ?>

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

<?php
require './footerinclude.php';
?>
