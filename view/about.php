<!--
Authors: Rebecca Bailey and Brenna Greggs
Purpose: This is where people can see the purpose of the organization as well as see the current board
         members and a short bio about them
-->
<?php
require './headerinclude.php';
?>

<div  class="index-template"><!--template-div: div on the body that contains images, and the two sections for the different kinds of feeds-->
    <div  class ="row"><!-- adds rows within the container -->

        <!--Image across top-->
        <div class = "col-4 offset-4">
            <img id="escapeRoomPicInfo" src = "../images/escRoomPhoto.jpg" alt = "escape room group photo">
        </div>

        <!--start of the officers box-->
        <div class="col-5 offset-1 ">
            <h1 class="message_box_title">Officers</h1>
            <div class="message_box "><!-- board-->
                <h4 id="president">President: Becky Baily</h4><!--President title-->
                <p class = "feed feed_side_space" id = "presidentBio">Ms. Bailey is a senior Computer Science major. She enjoys spending time up in
                    TechFloor doing homework and playing video games with friends. She brings board games to play after
                    the meetings.
                </p><!--end president bio-->
                <h4 id = "vicepresident">Vice President: Vinny Coniglio</h4><!--Vice President title-->
                <p class = "feed feed_side_space" id = "vicepresidentBio">Mr. Coniglio is a junior Information Systems major. He likes to "just hang out
                    and play video games" and feels TechFloor is "a great place for like minded people who like
                    games, technology, and hanging out". He also believe it is a great place for help with CIS classes.
                </p><!--end vice president bio-->
                <h4 id="treasurer">Treasurer: David O'Donnell</h4><!--Treasurer title-->
                <p class = "feed feed_side_space" id = "treasurerBio">Mr. O'Donnell is a senior Computer Science Major. He has been a member of TechFloor for
                    over 5 years. He is in regular communication with alumni including former TechFloor presidents.
                    He is expecting to graduate fall 2018.
                </p><!--end Treasurer bio-->
                <h4 id = "secretary">Secretary: Thomas Csorba</h4><!--Secretary title-->
                <p class = "feed feed_side_space" id = "secretaryBio">Mr. Csorba is a sophomore Computer Science major. He works in the computer lab in Becht.
                    He is almost always the friendly face that you will see when you knock on the door!
                </p><!--end Secretary bio-->
                <h4 id = "techmanager">Tech Manager: Anthony Grenus</h4><!--Tech Manager title-->
                <p class = "feed feed_side_space" id = "techmanagerBio">Mr. Grenus is a junior Information Systems major. He likes video games and feels
                    "TechFloor is an amazing place for people to meet who have similar interests or just enjoy having fun".
                </p><!--end Tech Manager bio-->
                <h4 id="publicrelations">Public Relations: Sam Pritchard</h4><!--Public relations title-->
                <p class = "feed feed_side_space" id = "publicrelationsBio">Ms. Pritchard is a freshman Physics major. She works in the Physics office in STC.
                    She likes hanging out in TechFloor and enjoys playing all versions of Zelda.
                </p><!--end public relations bio-->
                <h4 id="communityservice">Community Service Chair: Ryan "Moses" Moser</h4><!--Community Service Chair title-->
                <p class="feed feed_side_space" id = "communityserviceBio">Mr. Moser is a freshman Library Science major. He has started a Dungeons and Dragons
                    campaign that takes place Mondays at 3:00 p.m. that everyone is welcome to!
                </p> <!--end community service chair bio-->

            </div><!--end board-->
        </div><!--end officers-->

        <div class="col-4 offset-1"><!--start organization info-->
            <h1 class="message_box_title">The Organization</h1>
            <div class="message_box feed_side_space"><!--start organization info-->
                <p>
                    Clarion University TechFloor is a recognized student organization where we do homework,
                    work with computers, program, and play video games. We run various community service
                    events every year, which can include seminars, programming contests, and video game
                    tournaments. We also offer tutoring and general guidance with various CIS courses.(We'll
                    even try to help you with your personal computers!)
                    <br>
                    <br>
                    Meetings are held every Monday at 7:30 p.m. in our room in Ralston Hall. See the daily schedule
                    and keep an eye on the Twitter feed for updates on when we are open.
                </p>
            </div><!--end of organization info-->

            <div><!--start of Developer contact-->
                <h1 class="message_box_title">Contact Developers</h1>
                <div class="message_box feed_side_space"><!--start developer info-->
                    <p>
                        Want to contact the developers of the website? Send an email to <a href='mailto:r.l.bailey@eagle.clarion.edu'>Rebecca Bailey here</a>
                        or <a href='mailto:b.m.greggs@eagle.clarion.edu'>Breanna Greggs here!</a>
                    </p>
                </div><!--end of Developer info-->
            </div>
        </div><!-- end of organization-->
    </div> <!-- end of Row-->
</div> <!-- end of template -->

<?php
require './footerinclude.php';
?>
