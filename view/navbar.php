<!--
Authors: Rebecca Bailey and Breanna Greggs
Purpose: Create a dedicated navbar html page so that when edits need made to the navigation it can
be done in one central place.

Last Modification: "..controller/controller.php?action=" was added to ALL href instances so that
the navigation bar goes through our controller
-->

<!-- Nav Start -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-tf-bg">
    <a href="../controller/controller.php?action=Home">
    <img class="navbar-brand" src="../images/Functional/tfLogoNoWhite.png" alt="TechFloor" width="50" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

            <!--this is the home navigation item-->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="../controller/controller.php?action=Home">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- About Us Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="../controller/controller.php?action=About">About</a>
            </li>
            <!--this is the Events page navigation dropdown item-->
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle navbar-tf-bg navbarHov" href="..controller/controller.php?action=CurrentEvents" id="events_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
                <div class="dropdown-menu navbarDropDown" aria-labelledby="dropdown01">
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=CurrentEvents">Current Events</a>
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=PastEvents">Past Events</a>
                </div>
            </li>
            <!--this is the brackets page navigation dropdown item-->
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle disabled navbar-tf-bg navbarHov" href="../controller/controller.php?action=CurrentBrackets" id="brackets_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brackets</a>
                <div class="dropdown-menu navbarDropDown" aria-labelledby="dropdown01">
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=CurrentBrackets">Current Bracket</a>
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=PastBrackets">Past Brackets</a>
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=CreateBrackets">Create Bracket(s)</a>
                </div>
            </li>
            <!-- Sign Up Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="../controller/controller.php?action=SignUp">Sign Up</a>
            </li>
            <!-- Resource Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="../controller/controller.php?action=Resources">Resources</a>
            </li>
            <!-- Profile Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="../controller/controller.php?action=Profile">Profile</a>
            </li>
            <!--this is the Help page navigation dropdown item-->
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle navbar-tf-bg navbarHov" href="../controller/controller.php?action=FindUs" id="help_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Help</a>
                <div class="dropdown-menu navbarDropDown" aria-labelledby="dropdown01">
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=FindUs">Find Us</a>
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=Ideas">Ideas</a>
                    <a class="dropdown-item navbarDropDown" href="../controller/controller.php?action=Admin">Admin</a>
                </div>
            </li>

            <!-- leaving in the disabled action for future reference -->
            <!-- <li class="nav-item">
                <a class="nav-link disabled bg-navbar-tf" href="#">Disabled</a>
            </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav><!---end of navigation bar -->