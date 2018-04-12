<?php
$title = "Find Us"; //necessary variable to have each pages title be unique
require '../view/headerinclude.php';
?>

<div class="index-template" >
        <div class = "row"><!-- seems to allow for grid layout to take place and organize things horizontally-->

            <!-- border across top-->
            <img class = "col-10 offset-1" src = "../images/Functional/temp.png" alt = "cool blue techy background"  >

            <div class = "col-6 offset-3"><!-- start Find Us message_box -->
                <h3 class="message_box_title">Find Us</h3>
                <div class="message_box ">
                    <img src="../images/Functional/clarionMap.png" alt="Map of Clarion University campus">
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

<?php
require '../view/footerinclude.php';
?>