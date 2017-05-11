<header>
	<div id="logo"> 
		<img src="images/header/logo.png" alt="logo du chenil" height="150" width="150"/>
	</div>
 
	<nav>
		<div class="entete">
			<a href="../index.php"> Accueil </a>
		</div>
	
		<div class="entete">
		<ul>
			<li> Réservation
				<ul>
					<li><a href="../tarif.php"> Tarifs et descriptions </a></li>
					<li><a href="../calendrier.php"> Calendrier </a></li>
				</ul>
			</li>
		</ul>
		</div>

		<div class="entete">
			<a href="../information.php"> Information </a> 			
		</div>

		<div class="entete">
			<ul>
				<li>
					Mon compte
					<ul>
						<?php
							if(isset($_SESSION['id'])){
								echo("	<li><a href=\"../espacePrive.php?init=1\"> page de gestion </a></li>");
								if($_SESSION['type']=='Administrateur'){
									echo("<li><a href=\"../espacePrive.php?creation=1\"> création de compte </a></li>");
								}
								echo("<li><a href=\"../index.php?offline=1\"> deconnexion </a></li> ");
							}
							else{
								echo("<li><a href=\"../connexion.php\"> connexion </a></li>");
							}
						?>
					</ul>
				</li>
			</ul>
		</div>
	</nav>

	<div id="social">
		<div class="logoSocial">
			<a href="http://www.facebook.com" target="_blank"> 
			<img src="images/header/fb.png" alt="logo Facebook" height="50" width="50"/> </a>
		</div>

		<div class="logoSocial">
			<a href="http://www.twitter.com" target="_blank"> 
			<img src="images/header/twt.png" alt="logo Twitter" height="50" width="50"/> </a> 
		</div>

		<div class="logoSocial">
			<a href="http://www.instagram.com" target="_blank"> 			
			<img src="images/header/insta.png" alt="logo Instagram" height="50" width="50"/> </a>
		</div>
	</div> 
</header>
