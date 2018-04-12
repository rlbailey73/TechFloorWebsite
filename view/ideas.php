<?php
$title = "Ideas for Site"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template" >
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <!-- border across top-->
            <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

            <div class = "col-6 offset-3"><!-- start Ideas message_box -->
                <h3 class="message_box_title">Influential Websites</h3>
                <div class = "message_box scroll">
                    <p class="lead">
                    <ul class="feed_side_space">
                        <li class = "feed"><a href="http://techfloor.wixsite.com/mysite">The Current TechFloor website</a></li>
                        <li class = "feed"><a href="http://wieldersofpower.com/pages/index.php?action=Home">Jared Meterko's Website for his novels</a> </li>
                        <li class = "feed"><a href="http://cisprod.clarion.edu/~S_JJDunn/RocketLeague370/controller/controller.php?action=Home">A previous students 370 project</a> </li>
                    </ul>
                    </p><!--end Ideas paragraph-->
                </div>
            </div><!-- end Ideas message_box -->

        </div><!-- end row -->
    </div><!--end index-template-->


</div><!-- /.container -->

<?php
require '../view/footerinclude.php';
?>

