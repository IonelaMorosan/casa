<!DOCTYPE html>
<html>
<head>
    <?php
 require 'head.php';
  ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

/* Style inputs */
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

/* Style the container/contact section */
.container {
    border-radius: 5px;
    padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
    float: left;
    width: 50%;
    margin-top: 6px;
    padding: 20px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .column, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}

.carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #7a1f1f;
}

.carousel-indicators li {
    border-color: #7a1f1f;
}

.carousel-indicators li.active {
    background-color: #7a1f1f;
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
}

.item span {
    font-style: normal;
}
.footer{
  background-color: #fefefe;
}
input[type=text], textarea,select,option{
    padding: 6px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #7a1f1f;
    box-sizing: border-box;
}
</style>
</head>
<body>
  <?php
 require 'meniu.php';
  ?>


<div class="container">
  <div style="text-align:center">
    <h2>Contactează-ne</h2>
    <p>Mesajul Dumnevoastră contează pentru noi</p>
  </div>
  <div class="row">
    <div class="column">
      <div id="map" style="width:100%;height:500px"></div>
    </div>
    <div class="column">
      <form action="/action_page.php">
        <label for="fname">Numele</label>
        <input type="text" id="fname" name="firstname" placeholder="Numele tău..">
        <label for="lname">Prenumele</label>
        <input type="text" id="lname" name="lastname" placeholder="Prenumele tău..">
        <label for="country">Oraș</label>
        <select id="country" name="country">
          <option value="australia">Chișinău</option>
          <option value="canada">Anenii Noi</option>
          <option value="usa">Chetrosu</option>
        </select>
        <label for="subject">Subiect</label>
        <textarea id="subject" name="subject" placeholder="Scrie aici.." style="height:170px"></textarea>
        <input type="submit" value="Trimite">
      </form>
    </div>
  </div>
</div>

<script>
// Initialize google maps
function myMap() {
  var myCenter = new google.maps.LatLng(47.00556,28.8575);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 12};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBmdUPwEq1dOrtacjCTTHDrL4iIlNDSsg&callback=myMap"></script>

<h2 align="center">Mesajele lăsate de clienții noștri</h2>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <h4>"Am rămas mulțumită de calitate și preț! Recomand cu încredere!"<br><span style="font-style:normal;">Cristescu Alina</span></h4>
    </div>
    <div class="item">
      <h4>"Cea mai bună patiserie din oraș!"<br><span style="font-style:normal;">Silvia Radu</span></h4>
    </div>
    <div class="item">
      <h4>"Livrare la timp și calitatea superioară a tortelor!"<br><span style="font-style:normal;">Andreea Simon</span></h4>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
  require 'footer.php';
?>
</body>
</html>
