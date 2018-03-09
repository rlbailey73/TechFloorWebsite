/* ********
 *Authors: Breanna Greggs and Rebecca Bailey
 *Purpose: serve as our custom javascript page in order to have fancy pages
 ******* */

/*
Function: displayFooter()
Purpose: to display the footer along the bottom of the screen
 */
function displayFooter()
{
    //finds the id in the html to display the footer
    var tfSiteFooter = document.getElementById("tfFooter");
    //creates a date variable to help display the year
    var currentDate = new Date();
    //styles for the footer
    tfSiteFooter.style.fontSize = "large";
    tfSiteFooter.style.color = "White";
    //displays the copyright symbol and the current year plus the makers of the site
    tfSiteFooter.innerHTML=("&copy"+currentDate.getFullYear() + " Rebecca Bailey and Breanna Greggs || <a href='mailto:techfloor@clarion.edu'>Contact TechFloor here!</a>");

    // creates an element of type IMG
    var techFloorLogo = document.createElement("IMG"); //techfloor logo
    var clarionImage = document.createElement("IMG"); //clarion logo

    //techfloor logo things

    //clarion logo things
}

/* function to call the google map location for techfloor */
function initMap() {
    var clarion = {lat: 41.2083368, lng: -79.37792530000002};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: clarion
    });
    var marker = new google.maps.Marker({
        position: clarion,
        map: map
    });
}

/*
Function: loadNavBar
Purpose: be called in order to load the navbar on each html page rather than pasting the nav
bar code onto each page.
 */
function loadNavBar() {
    $(document).ready(function() {   //$ = Jquery
        $('#navbar').load('../view/navbar.html');
    });
}