<h2> Modifier un animal </h2>
	<form method="post" action="client.php" enctype="multipart/form-data">
		<fieldset>
			<label for="ani" class="pt"> Type d'animal </label></br>
			<input type="radio" name="ani" value="chat" id="chat" checked/> <label for="Chat">Chat</label></br>
			<input type="radio" name="ani" value="rongeur" id="rongeur"/> <label for="Rongeur">Rongeur</label></br>
			<input type="radio" name="ani" value="chien" id="chien"/> <label for="Chien">Chien</label></br></br>
			<label for="nom" class="pt" > Le nom de votre animal  </label></br>
			<input type="text" name="nom" id="nom" placeholder="Nom" size="10" pattern="[a-zA-Z]{3,25}" required/></br></br>    
			<label for="identification" class="pt" pattern="[a-zA-Z0-9]{3,25}" > L'identification de votre animal (tatouage/puce) </label></br>
			<input type="text" name="identification" id="identification" placeholder="AZ2JZ8" size="10" pattern="[a-zA-Z0-9]{3,10}" required/></br></br>
			<label for="certificat" class="pt" > Envoyez-nous le carnet de vaccin de votre animal </label></br>
			<input type="file" name="certificat" id="certificat" required /></br></br>
			<input type="submit" value="Enregistrer"/>
			<?php include("Script_PHP/Client/traitementModifAnimal.php") ?>
		</fieldset>
	</form>
