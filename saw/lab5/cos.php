<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
  require 'head.php';
?>
<style>
body {
  font-family: Arial;
  font-size: 17px;

}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #fefefe;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],input[type=date],input[type=time] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=date],input[type=time]{
  padding: 6px 10px;
  border: 1px solid #7a1f1f;
  box-sizing: border-box;
}
input[type=number]{
  padding: 6px 15px;
  border: 1px solid #7a1f1f;
  box-sizing: border-box;
  width: 70px;
  margin-left: 30px;

}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #7a1f1f;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #ffb3b3;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}
p,a{
  color: black;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<?php
 require 'meniu.php';
?>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
            <h3>Adresa De Facturare</h3>
            <label for="fname"><i class="fa fa-user"></i>Numele</label>
            <input type="text" id="fname" name="firstname" placeholder="Petricenco A.">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="petricenco@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Adresa</label>
            <input type="text" id="adr" name="address" placeholder="Stefan cel Mare 3/1, scara 2, etajul 5, ap. 43">
            <label for="city"><i class="fa fa-institution"></i>Oras</label>
            <input type="text" id="city" name="city" placeholder="Chișinău">

            <div class="row">
              <div class="col-50">
                <label for="state">Data livrării</label>
                <input type="date" id="state" name="state" placeholder="27/06/18">
              </div>
              <div class="col-50">
                <label for="zip">Ora livrării</label>
                <input type="time" id="zip" name="zip" placeholder="18:00">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Plată</h3>
            <label for="fname">Noi acceptăm</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Numele</label>
            <input type="text" id="cname" name="cardname" placeholder="Petricenco Alina">
            <label for="ccnum">Numărul cardului</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Luna expirării</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="Septembrie">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Anul expirării</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Adresa livrării este și cea de facturare
        </label>
        <input type="submit" value="Comandă" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Coș <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>2</b></span></h4>
      <div data-ng-app="" data-ng-init="quantity1=1;price1=255;quantity2=3;price2=49;">
         <p><a href="#">Produs1</a><span class="price">{{price1}} lei</span><input type="number" ng-model="quantity1"></p>
         <p><a href="#">Produs2</a><span class="price">{{price2}} lei</span><input type="number" ng-model="quantity2"></p>

        
      <hr>
      <p>Total <span class="price" style="color:black"><b>{{quantity1 * price1 +quantity2 * price2}} lei</b></span></p>
  </div>
  
      
    </div>
    <!---
     <div class="col-25">
    <div class="container">
      <h4>Coș <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Produs 1</a> <span class="price">150 lei</span></p>
      <p><a href="#">Produs 2</a> <span class="price">50  lei</span></p>
      <p><a href="#">Produs 3</a> <span class="price">320 lei</span></p>
      <p><a href="#">Produs 4</a> <span class="price">120 lei</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>640 lei</b></span></p>
    </div>
  </div> -->
  </div>
</div>
<?php
  require 'footer.php';
?>
</body>
</html>
