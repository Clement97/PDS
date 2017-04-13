<!DOCTYPE html>
<html>
<head> 
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="style.css"/>
	<title> comChien&Chat </title>
</head>

<body>

	<?php include("structure/header.php") ?>
	
	<div id="operateur">
		
		<div class="ptope">
			<h2> Consultation des places occupées </h2>
			<form method="post" action="">
				<fieldset>	
					<label for="datedeb" class="pt"> Date début  </label></br>
					<input type="date" name="datedeb" id="datedeb" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
					<!--min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS-->
				
					<label for="datefin" class="pt"> Date de fin </label></br>
					<input type="date" name="datefin" id="datefin" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
						
					<input type="submit" value="rechercher"/>
					
					<p> Pour ces dates, <strong> 18 </strong> place(s) sont occupée(s). </p>
					
				</fieldset>
			</form>
		</div>
		
		<div class="ptope">
			<div class="resope">
				<h2> Consultation et suppression des réservations </h2>
			</div>
			
			<div class="resope">
				<form method="post" action="">
					<fieldset>	
						<label for="datedeb" class="pt"> Date début  </label></br>
						<input type="date" name="datedeb" id="datedeb" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
					<!--min= date('d/m/Y') et max= date('d/m/Y')+6 mois pour respecter conditions du PDS-->
				
						<label for="datefin" class="pt"> Date de fin </label></br>
						<input type="date" name="datefin" id="datefin" placeholder="jj/mm/aaaa" size="4" maxlength="10" step="10" required/></br></br>
					
						<label> Type d'animal </label></br>
						<select name="animal" size="1">
							<option> Tous </option>
							<option> Chien </option>
							<option> Chien avec extra </option>
							<option> Chat </option>
							<option> Rongeur </option>
						</select> <br/> <br/>
							
						<input type="submit" value="rechercher"/>
						</form>
					</div>
				
				<div class="resope">	
					<ul>
						<li> MARTI Enzo - 15/03/17 au 17/03/17 - chat - isolé - Ulahup - 90€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li><br/>
						<li> ALDOBRANDI Clément - 18/03/17 au 24/03/17 - chien - isolé - Jul - 280€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li><br/>
						<li> MARTI Enzo - 15/03/17 au 17/03/17 - chat - isolé - Ulahup - 90€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li><br/>
						<li> ALDOBRANDI Clément - 18/03/17 au 24/03/17 - chien - isolé - Jul - 280€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li><br/>
						<li> MARTI Enzo - 15/03/17 au 17/03/17 - chat - isolé - Ulahup - 90€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li><br/>
						<li> ALDOBRANDI Clément - 18/03/17 au 24/03/17 - chien - isolé - Jul - 280€ <a href=""><img src="images/client/croix.png" alt="croix" height="15" weight="15"/></a> </li><br/>
					</ul>
				</div>
					
				<p>
					--PDS-- La suppression d'une réservation modifie le nombre de places -> moyen commun à "gestion des places" et "suppression de réservations"
				</p>
			
				</fieldset>
			</form>
		</div>
		
	</div>
		
	<?php include("structure/footer.php") ?>

</body>

</html>
