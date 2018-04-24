<!-- This will be the footer html page so that the footer can be treated similarly to the navbar.
This allows the footer to be edited in one place rather than several different areas. -->

<footer class="align-bottom footer-template">

    <div>
        Join us on any of our Social Networks!
        <ul id="social-footer">
            <li><a href="https://www.facebook.com/techfloor/" title="Clarion TechFloor's Facebook Page" target="new"><span class="fa fa-facebook-square fa-3x"></span></a></li>
            <li><a href="https://twitter.com/TechFloor" title="Connect to TechFloor's Twitter!" target="new"><span class="fa fa-twitter-square fa-3x"></span></a></li>
            <li><a href="https://www.twitch.tv/cu_techfloor" title="TechFloor's Twitch Page, where we stream tournaments" target="new"><span class="fa fa-youtube-square fa-3x"></span></a></li>
            <li><a href="https://discord.gg/fUbkWPe" title="TechFloor's Discord to Keep up to date with latest news!" target="new"><i class="fab fa-discord"></i></a></li>
        </ul>
    </div>

    <a href='mailto:techfloor@clarion.edu'><u>Contact TechFloor here!</u></a> || <a href="../controller/controller.php?action=About"><u>About</u></a>

    <div id="footerCopyAuthor">
        &copy2018 Rebecca Bailey and Breanna Greggs ||
        <?php
            date_default_timezone_set('EST'); //sets the defualt time zone
            echo "Last modified: " . date ("F d Y H:i", getlastmod());
        ?>
    </div>
</footer>