<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/tfFavicon.png">

    <title>Ideas</title>

    <!-- JavaScript -->
    <<!-- JQuery -->
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
            <img class = "col-10 offset-1" src = "../images/temp.png" alt = "cool blue techy background"  >

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