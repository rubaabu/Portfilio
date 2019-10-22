<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
          /* Set the size of the div element that contains the map */
      #map {
        height: 400px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
     
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      p,h4,h1{
      color: #176d81;
      text-align: center;
     
      
   }
   body{
       background-color: #d0ecf0
   }
    </style>
  </head>
  <body>
   


  
    <!--The div element for the map -->
    <div id="map"></div>
    <script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 48.183200, lng:16.356300};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>

  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
    async defer></script>
   <h1>Welcome to our website</h1>
   <h4>if you want to see our products <a href="login.php">Login</a></h4>
   <p>if you you don't have an account please  <a class="underlineHover" href="register.php">register</a></p>

  </body>
</html>