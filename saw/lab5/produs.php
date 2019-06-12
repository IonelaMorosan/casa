<!DOCTYPE html>
<html lang="en">
<?php
  require 'head.php';
?>
<style>
.carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
    .container{
    	margin-top: 30px;
    }
ul.breadcrumb {
    padding: 2px 5px;
    list-style: none;
 	margin-top: 10px;
 	background-color: white;
 	text-align: center;
}
ul.breadcrumb li {
    display: inline;
    font-size: 12px;
}
ul.breadcrumb li+li:before {
    padding: 5px;
    color: #7a1f1f;
    content: "/\00a0";
}
ul.breadcrumb li a {
    color: #511515;
    text-decoration: none;
}
ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}
.well{
        background-color: #fefefe;
        border: 1px solid #7a1f1f;
        color: #7a1f1f;
}
</style>
<body>
<?php
 require 'meniu.php';
?>
<ul class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li><a href="produse.php">Produse</a></li>
  <li><a href="produse.php">Torturi pentru nuntă</a></li>
  <li>Tort "Smântânel"</li>
</ul>
<div class="container">
<div class="row">
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/9.jpg" alt="Image">
          <div class="carousel-caption">
            <h3>Tort "Smântânel"</h3>
          </div>      
        </div>

        <div class="item">
          <img src="img/9.jpg" alt="Image">
          <div class="carousel-caption">
            <h3>Tort "Smântânel"</h3>
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
  </div>
  <div class="col-sm-4 text-center">
    <div class="well">
      <p>Tort "Smântânel"</p>
    </div>
    <div class="well">
       <p> Pentru cei care nu concept să treacă cel puțin o zi din viața lor, fără să savureze un desert, dar sunt în criză de timp, echipa Dolce Parma pregătește o rețetă fenomenală! Impresionați-i pe cei dragi cu un desert absolut delicios care se topește în gură!</p>
    </div>
    <div class="well">
       <p>Prețul 167 lei/kg</p>
    </div>
  </div>
</div>
<hr>
</div>
<div class="container text-center">    
  <h3>Detaliile comenzii</h3>
  <br>
  <div class="row">
    <div class="col-sm-3">
      <img src="img/cherry.jpg" class="img-responsive" style="width:100%" alt="Image">
      <div class="checkbox">
      <label><input type="checkbox" value="">Cireșe</label>
    </div>
    </div>
    <div class="col-sm-3"> 
      <img src="img/s.jpg" class="img-responsive" style="width:100%" alt="Image">
      <div class="checkbox">
      <label><input type="checkbox" value="">Căpșune</label>
    </div>   
    </div>
    <div class="col-sm-3">
      <div class="well">
       <form>
        <p>Preferințe:</p>
    <div class="checkbox">
      <label><input type="checkbox" value="">Înlocuitor de zahăr</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Hipocaloric</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Fitness</label>
    </div>
  </form>
      </div>
      <div class="well">
        <p>Cantitatea:</p>
       <select class="form-control" id="sel1">
        <option>1 kg</option>
        <option>2 kg</option>
        <option>3 kg</option>
        <option>4 kg</option>
      </select>
      <br>
      </div>
      
    </div>
    <div class="col-sm-3">
      <div class="well">
       <form>
        <p>Decor:</p>
    <div class="checkbox">
      <label><input type="checkbox" value="">Ciocolată</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Smântână</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Fructe</label>
    </div>
  </form>
      </div>
      <div class="well">
        <p>Etaje</p>
       <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
      <br>
      </div>
    </div>  
  </div>
  <hr>
</div>
<div class="container text-center">    
  <p>Preț total: </p>
  <p><a href="#"><button type="button" class="btn btn-danger">Adaugă în coș</button></a></p>
</div>

<div class="container text-center">    
  <h3>Alte produse solicitate</h3>
  <br>
  <div class="row">
    <div class="col-sm-2">
      <img src="img/9.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p><a href="produs.php">Tort "Smântânel"</a></p>
    </div>
    <div class="col-sm-2"> 
      <img src="img/9.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p><a href="produs.php">Tort "Smântânel"</a></p>  
    </div>
    <div class="col-sm-2"> 
      <img src="img/9.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p><a href="produs.php">Tort "Smântânel"</a></p>
    </div>
    <div class="col-sm-2"> 
      <img src="img/9.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p><a href="produs.php">Tort "Smântânel"</a></p>
    </div> 
    <div class="col-sm-2"> 
      <img src="img/9.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p><a href="produs.php">Tort "Smântânel"</a></p>
    </div>     
    <div class="col-sm-2"> 
      <img src="img/9.jpg" class="img-responsive" style="width:100%" alt="Image">
      <p><a href="produs.php">Tort "Smântânel"</a></p>
    </div> 
  </div>
</div><br>

<?php
  require 'footer.php';
?>
</body>
</html>