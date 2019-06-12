<!DOCTYPE html>
<html lang="en">
<?php
  require 'head.php';
?>
<style>
.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination a.active {
    background-color: #511515;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.btn {
    border: 1px solid #7a1f1f;
    background-color: white;
    color: #7a1f1f;
    padding: 5px 10px;
    font-size: 12px;
    cursor: pointer;
    margin-bottom: 10px;
}
.btn:hover{
  background: #7a1f1f;
    color: white;
    border: 1px solid #7a1f1f;
  }
  .btn:active{
  background: #7a1f1f;
    color: white;
    border: 1px solid #7a1f1f;
  }
/* Red */
.danger {
    border-color: #7a1f1f;
    color: #7a1f1f;
}

.danger:hover {
    background: #7a1f1f;
    color: white;
}

form.example input[type=text] {
    padding: 5px;
    font-size: 12px;
    border: 1px solid #7a1f1f;
    float: left;
    width: 80%;
    background: #f1f1f1;
    margin-bottom: 10px;
}

form.example button {
    float: left;
    width: 20%;
    padding: 5px;
    background: #7a1f1f;
    color: white;
    font-size: 12px;
    border: 1px solid #7a1f1f;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #511515;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
p,h2{
  color: #511515;;
}

</style>
<body>
<?php
 require 'meniu.php';
?>

<div class="container-fluid text-center bg-grey">
  <h2>Simte gustul patiseriei italine cu creațiile noastre</h2><br>
<p>Caută produsul potrivit</p>
<form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Caută.." name="search2">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
<div>
<button class="btn danger">Torturi pentru copii</button>
<button class="btn danger">Torturi pentru nunți</button>
<button class="btn danger">Torturi de sărbătoare</button>
<button class="btn danger">Torturi pentru corporative</button>
<button class="btn danger">Colaci la comandă</button>
<button class="btn danger">Candy bar</button>
</div>
  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/9.jpg" alt="Paris" width="400" height="300">
        <p><strong>Tort "Smântânel"</strong></p>
        <p>Blaturi subţiri de miere, cremă de smîntînă, ornat cu ciocolată şi cocos</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/10.jpg" alt="New York" width="400" height="300">
        <p><strong>Tort "Deliciu"</strong></p>
        <p>Blaturi cu miere, cremă de frișcă cu lapte condensat, zmeură, ciocolată</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/8.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Tort "Tiramisu"</strong></p>
        <p>Pandișpan alb, cremă de frișcă și ciocolată, stafide, nucă, decorat cu glazură de ciocolată</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
  </div>

 <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/9.jpg" alt="Paris" width="400" height="300">
        <p><strong>Tort "Smântânel"</strong></p>
        <p>Blaturi subţiri de miere, cremă de smîntînă, ornat cu ciocolată şi cocos</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/10.jpg" alt="New York" width="400" height="300">
        <p><strong>Tort "Deliciu"</strong></p>
        <p>Blaturi cu miere, cremă de frișcă cu lapte condensat, zmeură, ciocolată</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/8.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Tort "Tiramisu"</strong></p>
        <p>Pandișpan alb, cremă de frișcă și ciocolată, stafide, nucă, decorat cu glazură de ciocolată</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/9.jpg" alt="Paris" width="400" height="300">
        <p><strong>Tort "Smântânel"</strong></p>
        <p>Blaturi subţiri de miere, cremă de smîntînă, ornat cu ciocolată şi cocos</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/10.jpg" alt="New York" width="400" height="300">
        <p><strong>Tort "Deliciu"</strong></p>
        <p>Blaturi cu miere, cremă de frișcă cu lapte condensat, zmeură, ciocolată</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/8.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Tort "Tiramisu"</strong></p>
        <p>Pandișpan alb, cremă de frișcă și ciocolată, stafide, nucă, decorat cu glazură de ciocolată</p>
        <p><a href="produs.php"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/9.jpg" alt="Paris" width="400" height="300">
        <p><strong>Tort "Smântânel"</strong></p>
        <p>Blaturi subţiri de miere, cremă de smîntînă, ornat cu ciocolată şi cocos</p>
        <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/10.jpg" alt="New York" width="400" height="300">
        <p><strong>Tort "Deliciu"</strong></p>
        <p>Blaturi cu miere, cremă de frișcă cu lapte condensat, zmeură, ciocolată</p>
        <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/8.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Tort "Tiramisu"</strong></p>
        <p>Pandișpan alb, cremă de frișcă și ciocolată, stafide, nucă, decorat cu glazură de ciocolată</p>
        <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/9.jpg" alt="Paris" width="400" height="300">
        <p><strong>Tort "Smântânel"</strong></p>
        <p>Blaturi subţiri de miere, cremă de smîntînă, ornat cu ciocolată şi cocos</p>
        <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/10.jpg" alt="New York" width="400" height="300">
        <p><strong>Tort "Deliciu"</strong></p>
        <p>Blaturi cu miere, cremă de frișcă cu lapte condensat, zmeură, ciocolată</p>
        <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="img/8.jpg" alt="San Francisco" width="400" height="300">
        <p><strong>Tort "Tiramisu"</strong></p>
        <p>Pandișpan alb, cremă de frișcă și ciocolată, stafide, nucă, decorat cu glazură de ciocolată</p>
        <p><a href="#"><button type="button" class="btn btn-danger">Comandă acum</button></a></p>
      </div>
    </div>
  </div>

<div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a class="active" href="#">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div>

</div>
<?php
  require 'footer.php';
?>
</body>
</html>