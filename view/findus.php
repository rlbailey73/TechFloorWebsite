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

            <div class = "col-6 offset-3"><!-- start Find Us message_box -->
                <h3 class="message_box_title">Find Us</h3>
                <div class="message_box ">
                    <img src="../images/clarionMap.png" alt="Map of Clarion University campus">
                    <p class="lead">
                        TechFloor
                        <br>
                        Ralston Hall, Clarion University
                        <br>
                        840 Wood Street
                        Clarion, PA 16214
                        <br>
                        WHERE TO FIND US
                        <ol>
                            <li>We are located in Ralston Hall, right between Gemmell and Givan.
                                It is squared in green on the map. There are signs in the building to help you find us.<br><br>
                            </li>
                            <li>Entering Ralston through the main entrance: go left and down the hallway until you see
                                a staircase on your right, go down one flight of stairs, go left and we’re the first door on your left.
                            </li>
                        ​    <li>Entering Ralston through the basement entrance: go straight until the end of the hallway,
                               go up the stairs until the next floor, go left, and we’re the first door on your left.<br>
                            </li>
                        </ol>


                    </p><!--end Find Us paragraph-->
                </div>
                <div id="map">
                    <script>
                        window.onload=initMap();
                    </script>
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiG8HFddOHRXOL4jU42vG0LFxuIokooK0&callback=initMap">
                    </script>
                </div>
            </div><!-- end Find Us message_box -->

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