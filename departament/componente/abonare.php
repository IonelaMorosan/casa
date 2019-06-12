<div class="date_form_guest w3-container w3-yellow w3-border w3-card-8 w3-hover-border-green w3-padding-16">
		<form method="post" class="w3-container">
			<label class="w3-left-align w3-label w3-text-black w3-text-shadow" style="text-transform:uppercase;">Aboneaza-te pentru a primi informatii de ultima ora 
			<input type="email" name="email" placeholder="Introdu un e-mail valid" title = "Introdu o adresa de e-mail valida!" class="w3-border linie" size="100" /></label>
			<input type="submit" value="Abonare" class="w3-container w3-border w3-padding-16 w3-card-8 w3-green w3-text-white w3-hover-orange" onclick="saveEmail();" />
		</form>
		<div id="txtHint"><b><?php //echo $mess; ?></b></div>
</div>