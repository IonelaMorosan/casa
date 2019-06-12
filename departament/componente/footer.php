<!-- Footer -->
	<footer class="w3-xxlarge w3-padding-xlarge w3-green w3-text-white">
		<h3 class="w3-large w3-center">DEPARTAMENT COMENZI<br />FLOWERS</h3>
	</footer>

<!-- End page content -->
</div>

<script>
// Script to open and close sidenav
function w3_open() {
    document.getElementById("mySidenav").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidenav").style.display = "none";
}

function saveEmail() {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","adaugare_mesaj.php",true);
        xmlhttp.send();
	}
</script>

</body>
</html>
