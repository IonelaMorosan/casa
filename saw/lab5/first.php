<!DOCTYPE html>
<html lang="en">
<head>
<?php
  require 'head.php';
?>
<style>
.navbar {
  margin-bottom: 0;
  border-radius: 0;
  background-color: #7a1f1f;
  border: none;
}

.navbar-inverse .navbar-brand {
  color: white;
}

.navbar-inverse .navbar-nav > li > a {
  color: white;
}

.navbar-inverse .navbar-brand:hover,
.navbar-inverse .navbar-brand:focus {
    color: #ffb3b3;
}

.navbar-inverse .navbar-nav > li > a:hover,
 .navbar-inverse .navbar-nav > li > a:focus{
    color: #ffb3b3;
}

.navbar-inverse .navbar-nav > .active > a, 
.navbar-inverse .navbar-nav > .active > a:hover, 
.navbar-inverse .navbar-nav > .active > a:focus {
  background-color: #511515;
}

.navbar-inverse .navbar-nav > .open > a, 
.navbar-inverse .navbar-nav > .open > a:hover, 
.navbar-inverse .navbar-nav > .open > a:focus {
  background-color: #511515;
}  
    
.carousel-inner img {
  width: 100%; 
  margin: auto;

}

@media (max-width: 800px) {
  .carousel-caption {
    display: none; 
  }
}
.well{
        background-color: #fefefe;
        border: 1px solid #7a1f1f;
        color: #7a1f1f;
}
</style>
</head>
<body>
<?php
 require 'meniu.php';
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="img/cake5.jpg" alt="Image" >
        <div class="carousel-caption">
          <h3 style="color:#ffb3b3;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Torturi care vor face sărbătorile importante din viața dvs. mai frumoase și mai dulci!</h3>
          <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
        </div>      
      </div>

      <div class="item">
        <img src="img/2.jpg" alt="Image" style="max-width:1600px;">
        <div class="carousel-caption">
          <h3 style="color:#ffb3b3;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Torturi care vor face sărbătorile importante din viața dvs. mai frumoase și mai dulci!</h3>
          <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
        </div>      
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

<section class="w3-container w3-center w3-content" style="max-width:800px; color:#7a1f1f;">
  <h2 class="w3-wide">Dolce Parma</h2>
  <p class="w3-opacity"><i>arta patiseriei italine</i></p>
  <p class="w3-justify">De cele mai multe ori, succesul în afaceri vine la pachet cu creșterea atenției din partea potențialilor clienți. Ce poate ambiţiona mai mult un tânăr
   colectiv decât un urcuș rapid? Echipa ”Dolce Parma” este entuziasmată să vă fie sprijin la cele mai importante sărbători din viața Dumnevoastră. Împreună concepem ideile și 
   le realizăm la cel mai înalt nivel. Așteptăm cu drag comenzile voastre!</p>
</section>


 <div class="container">
 


          <div class="row">
        <div class="col-sm-4">
          <div class="well">
            <h2>Tradiţia Nunţii</h2>
      <img src="img/nunta.jpg" alt="Random Name" style="width:100%">
      <p>
Tortul este o tradiție frumoasă a nunții, așteptată cu nerăbdare de toți oaspeții. Cofetarii Dolce Parma vor realiza orice idee de-a ta, iar umpluturile rafinate, din ingrediente naturale, 
vor transforma tortul într-un adevărat deliciu. Tortul de nuntă de la Dole Parma este alegerea perfectă pentru evenimentul vostru de vis!
Savurați cel mai important eveniment cu Dolce Parma!</p>
     </div>
      
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h2>
Îndulcește-ți jumătatea de Ziua Îndrăgostiților</h2>
      <img src="img/vale.jpg" alt="Random Name" style="width:100%; margin-bottom:11px;">
      <p>Pentru că dragostea trece prin stomac atât la bărbați, cât și la femei, cofetarii de la Colibri și-au pus imaginația în mișcare și au conceput niște torturi care arată 
        spectaculos și au un gust delicios. Torturile și prăjiturile personalizate, în formă de inimioare sunt realizate din produse proaspete și de cea mai înaltă calitate.
        </p>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="well">
            <h2>Torturi exclusive cu tematică de iarnă</h2>
      <img src="img/ny.jpg" alt="Random Name" style="width:100%; margin-bottom:11px;">
      <p>Un cadou ideal pentru sărbătorile care se apropie. Gustul dvs. va fi apreciat de partenerii de la locul de muncă, de colegi și de șefi. Acesta poate deveni,
       de asemenea, 
        o decorațiune deosebită a petrecerii corporative. Dolce Parma așteaptă comenzile dvs. gustoase!</p>
          
          </div>
        </div>
      </div>

  </div>
  <!-- Band Members -->
<section class="w3-row-padding w3-center ">
      <h2>Cele mai solicitate torturi</h2>
  <article class="w3-third">
    <img src="img/ind1.jpg" alt="Random Name" style="width:100%; margin-bottom: 10px;">
    <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
  </article>
  <article class="w3-third">
    <img src="img/ind2.jpg" alt="Random Name" style="width:100%; margin-bottom: 10px;">
    <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
  </article>
  <article class="w3-third">
    <img src="img/ind3.jpg" alt="Random Name" style="width:100%; margin-bottom: 10px;">
    <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
  </article>
</section>
</div>
<?php
  require 'footer.php';
?>
</body>
</html>
