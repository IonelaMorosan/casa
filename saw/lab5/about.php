<!DOCTYPE html>
<html>
<?php
  require 'head.php';
?>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif;color: #511515;}
body, html {
    height: 100%;
    line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("/w3images/mac.jpg");
    min-height: 100%;
}
.w3-bar .w3-button {
    padding: 16px;
}
</style>
<body>
<?php
 require 'meniu.php';
?>

<!-- About Section -->
<div class="w3-container" style="padding:20px 16px" id="about">
  <h3 class="w3-center">Despre Dolce Parma</h3>
  <p class="w3-center w3-large">Principalele caracteristici ale companiei noastre</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
      <p class="w3-large">Preluarea comenzilor online</p>
      <p>Platforma oferă clienților posibilitatea de a face o comandă fără mare efort și pierdere de timp! Suntem alături de fiecare pentru a alege produsul potrivit.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Pasiune în detalii</p>
      <p>Patiserii companiei depun suflet și dragoste în fiecare comandă, produse de înaltă calitate și oameni care își iubesc slujba cresc succesul comaniei.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Design și originaliate</p>
      <p>Comenzile noastre rămân a fi unice prin culori, ornament și gust. Patiserii realizează cele mai complicate dorințe ale clienților noștri.</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
      <p class="w3-large">Livrare</p>
      <p>Pentru suportul clienților în cele mai ocupate zile, echipa vine cu posibilitatea de a livra produsele direct la festivitate, sărbătoare sau la domiciliu.</p>
    </div>
  </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:20px 16px" id="team">
  <h3 class="w3-center">ECHIPA</h3>
  <p class="w3-center w3-large">Cei care conduc această companie</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img/team2.jpg" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>Victoria Anisenco</h3>
          <p class="w3-opacity">CEO & Founder</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img/team1.jpg" alt="Jane" style="width:100%">
        <div class="w3-container">
          <h3>Silvia Ceban</h3>
          <p class="w3-opacity">Art Director</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img/team3.jpg" alt="Mike" style="width:100%">
        <div class="w3-container">
          <h3>Eugenia Scoarță</h3>
          <p class="w3-opacity">Contabil</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="img/team4.jpg" alt="Dan" style="width:100%">
        <div class="w3-container">
          <h3>Andreea Ixari</h3>
          <p class="w3-opacity">Patiser/Cofetar Șef</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Work Section -->
<div class="w3-container" style="padding:20px 16px" id="work">
  <h3 class="w3-center">Comenzile noastre</h3>
  <p class="w3-center w3-large">La cerințele clienților</p>

  <div class="w3-row-padding" style="margin-top:64px">
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A microphone">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox">
    </div>
  </div>

  <div class="w3-row-padding w3-section">
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tablet">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A camera">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A typewriter">
    </div>
    <div class="w3-col l3 m6">
      <img src="img/d2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A tableturner">
    </div>
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>




<?php
  require 'footer.php';
?>

</body>
</html>
