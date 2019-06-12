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
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 6px 10px;
    display: inline-block;
    border: 1px solid #7a1f1f;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.button1 {
    color: white;
    border: none;
    cursor: pointer;
    background-color: #7a1f1f;
}

.button1:hover, .button1:active{
  color: #ffb3b3;
}
/* Set a style for all buttons */
.button2 {
    background-color: #7a1f1f;
    color: white;
    padding: 6px 10px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.button2:hover,.cancelbtn:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 6px 10px;
    background-color: #7a1f1f;
    border: none;
    cursor: pointer;
    color: white;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 100%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #7a1f1f;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                        
    </button>
    <a class="navbar-brand" href="first.php">Dolce Parma</a>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="about.php">Despre noi</a></li>
      <li><a href="produse.php">Produse</a></li>
      <li><a href="contact.php">Contactează-ne</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="cos.php"><span class="glyphicon glyphicon-shopping-cart"></span> Coș<span class="badge">0</span></a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> <button class="button1" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></a></li>

    </ul>
  </div>
</div>
</nav>

<div id="id01" class="modal">
  <form class="modal-content animate" action="/action_page.php">
   

    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button class="button2" type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>