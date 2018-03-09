<!-- This will be the footer html page so that the footer can be treated similarly to the navbar.
This allows the footer to be edited in one place rather than several different areas. -->

<footer class="align-bottom footer-template">

    <a href='mailto:techfloor@clarion.edu'><u>Contact TechFloor here!</u></a> || <a href="./about.php"><u>About</u></a>

    <div id="footerCopyAuthor">
        &copy2018 Rebecca Bailey and Breanna Greggs ||
        <?php
            date_default_timezone_set('EST'); //sets the defualt time zone
            echo "Last modified: " . date ("F d Y H:i", getlastmod());
        ?>
    </div>

</footer>