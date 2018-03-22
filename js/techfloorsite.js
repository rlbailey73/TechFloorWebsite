/* ********
 *Authors: Breanna Greggs and Rebecca Bailey
 *Purpose: serve as our custom javascript page in order to have fancy pages
 ******* */

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
