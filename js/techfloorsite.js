/* ********
 *Authors: Breanna Greggs and Rebecca Bailey
 *Purpose: serve as our custom javascript page in order to have fancy pages
 ******* */

/*
Function: loadNavBar
Purpose: be called in order to load the navbar on each html page rather than pasting the nav
bar code onto each page.
 */
function loadNavBar() {
    $(document).ready(function() {   //$ = Jquery
        $('#navbar').load('navbar.html');
    });
};