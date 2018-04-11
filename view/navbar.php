<!--
Authors: Rebecca Bailey and Breanna Greggs
Purpose: Create a dedicated navbar html page so that when edits need made to the navigation it can
be done in one central place.
-->

<!-- Nav Start -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-tf-bg">
    <a href="./index.php">
    <img class="navbar-brand" src="../images/Functional/tfLogoNoWhite.png" alt="TechFloor" width="50" height="60">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

            <!--this is the home navigation item-->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- About Us Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="about.php">About</a>
            </li>
            <!--this is the Events page navigation dropdown item-->
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle navbar-tf-bg navbarHov" href="currentevents.php" id="events_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
                <div class="dropdown-menu navbarDropDown" aria-labelledby="dropdown01">
                    <a class="dropdown-item navbarDropDown" href="currentevents.php">Current Events</a>
                    <a class="dropdown-item navbarDropDown" href="pastevents.php">Past Events</a>
                </div>
            </li>
            <!--this is the brackets page navigation dropdown item-->
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle navbar-tf-bg navbarHov" href="currentbrackets.php" id="brackets_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brackets</a>
                <div class="dropdown-menu navbarDropDown" aria-labelledby="dropdown01">
                    <a class="dropdown-item navbarDropDown" href="currentbrackets.php">Current Bracket</a>
                    <a class="dropdown-item navbarDropDown" href="pastbrackets.php">Past Brackets</a>
                    <a class="dropdown-item navbarDropDown" href="createbracket.php">Create Bracket(s)</a>
                </div>
            </li>
            <!-- Sign Up Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="signup.php">Sign Up</a>
            </li>
            <!-- Resource Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="resources.php">Resources</a>
            </li>
            <!-- Profile Navigation Items -->
            <li class="nav-item active">
                <a class="nav-link navbar-tf-bg navbarHov" href="profile.php">Profile</a>
            </li>
            <!--this is the Help page navigation dropdown item-->
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle navbar-tf-bg navbarHov" href="findus.php" id="help_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Help</a>
                <div class="dropdown-menu navbarDropDown" aria-labelledby="dropdown01">
                    <a class="dropdown-item navbarDropDown" href="findus.php">Find Us</a>
                    <a class="dropdown-item navbarDropDown" href="ideas.php">Ideas</a>
                    <a class="dropdown-item navbarDropDown" href="admin.php">Admin</a>
                </div>
            </li>

            <!-- leaving in the disabled action for future reference -->
            <!-- <li class="nav-item">
                <a class="nav-link disabled bg-navbar-tf" href="#">Disabled</a>
            </li> -->
        </ul>
        <!--<form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav><!---end of navigation bar -->