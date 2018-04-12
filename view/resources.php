<?php
$title = "Resources"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template" >
    <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

        <!-- border across top-->
        <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

        <div class = "col-8 offset-2"><!-- start Resources message_box -->
            <h3 class="message_box_title">Useful Websites</h3>
            <div class = "message_box">
                    <h4><a href="https://cuconnect.clarion.edu/organization/techfloor">CU Connect</a></h4>
                    <p class = "feed feed_side_space">A link to our CuConnect webpage. This is wildly used by the university and each student
                    should register as a member here for any organization they join!</p>
                <h4><a href="http://cisprod.clarion.edu/~jstrausser/JodySite/index.html">Dr. Jody Strausser's Website/CIS Scholarships</a></h4>
                <p class="feed_side_space feed">This is Dr. Strausser's website! He is our advisor and an awesome Professor. He is in charge of scholarships
                for the CIS department and links for those can be found on his website!</p>
                    <h4><a href="http://jupiter.clarion.edu/~jodonnell/">Dr. O'Donnell's Website</a></h4>
                    <p class = "feed feed_side_space">This link takes you exactly where it says it will! However, Dr. O'Donnell's website
                    is hosted on Jupiter (We no longer use that regularly) so it doesn't load in some buildings on campus such as
                    Becker's Advanced Lab. His website can be used to find out various things about the CIS department since he is the
                    current head of the department.</p>
                    <h4><a href="https://www.aitp.org/">AITP Official Website</a></h4>
                    <p class = "feed feed_side_space">Here you can view the official AITP website. However, our chapter of AITP
                    is not listed here as we currently do not require the payment to register, among other things. Our AITP group
                    that we share a room and meeting date with (their meeting is at 7pm, while ours is at 7:30pm), does participate
                    in many things. Recently the AITP Programming Contest Team and the AITP Robotics Team for placed 2nd in the PACISE Conference
                        programming contest and 3rd in the PACISE conference robotics contest.</p>
                <h4><a href="http://www.clarion.edu/academics/career-services/plan-and-manage-your-career/getting-internship-and-work-experience/internship-search-strategies/resources-and-links-for-finding-an-internship.html#internshipsforspecificfields">Resources & Links for Finding Internships</a></h4>
                <p class="feed feed_side_space">This takes you to that specific page on Clarion University's website.</p>
            </div>
        </div><!-- end Resources message_box -->
    </div><!-- end row -->
</div><!--end index-template-->


</div><!-- /.container -->

<?php
require '../view/footerinclude.php';
?>
