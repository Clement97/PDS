
<?php

    unset($_SESSION['reservationOK']);

	function convertBox(&$box){
		if(($box)=='Seul'){
			return '1';
        }
		else return '0';
	}


    function reservationEffectuee(&$appelProcedure){
        include("Script_PHP/BDDAccess.php");
        if($bdd->exec($appelProcedure)==0){
            return 0;
        }
        else return 1;
    }

	$_SESSION['actionA']='reserver';

	if(isset($_GET['idAnimal']))
		$_SESSION['idAnimal']=$_GET['idAnimal'];

?>

            <h2> Consultation et réservation </h2>
                <form method="post" action="client.php">
                    <fieldset>
                        <div id="input">
                        <label for="date" class="pt"> Date d'entrée de votre animal:  </label></br>
                        <input type="date" name="date" id="date" placeholder="aaaa-mm-jj" size="8"  pattern="^[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required /></br></br>

                        <label for="duree" class="pt"> Durée du séjour </label></br>
                        <input type="text" name="duree" id="duree" pattern="[1234567]" placeholder="1-7" required/></br></br>

                        <label for="box" class="pt"> La condition de traitement de votre animal: </label> <br>
                        <input type="radio" name="box" value="Groupe" id="Groupe"/ checked > <label for="Groupe" class="choixlabel">En groupe</label></br>
                        <input type="radio" name="box" value="Seul" id="Seul"/> <label for="Seul" class="choixlabel">Seul</label></br></br>

                        <div id=insertion></div>
                		<input type="submit" value="Reserver" formenctype=""/></br></br>

                        <div id="invisible" >
  						<?php 
                			if(isset($_POST['date'])&&isset($_POST['duree'])&&isset($_POST['box'])){
                                if (! (empty($_POST['date'])||empty($_POST['duree'])||empty($_POST['box']))){

                                    $appelProcedure='CALL P_Reservation('.$_SESSION['idAnimal'].',\''.$_POST['date'].'\','.$_POST['duree'].',1,'.convertBox($_POST['box']).',';

                                    if(isset($_POST['Promenade'])&&($_POST['Promenade']=='on'))
                                        $appelProcedure=$appelProcedure.'1)';
                                    else
                                        $appelProcedure=$appelProcedure.'0)';
                                    
                                    include("Script_PHP/BDDAccess.php");
                                    if(reservationEffectuee($appelProcedure)==1){
                                        echo("<script> alert('Votre reservation a bien été effectuée')</script>");
                                        echo("<meta http-equiv=\"refresh\" content=\"1;url=espacePrive.php?init=1\"/>");
                                    }
                                    else{
                                        $requete=$bdd->query($appelProcedure);
                                        if($donnees = $requete->fetch()){
                                                echo($donnees['Erreur']);
                                        }
                                    }

                                }
                			} 
	// mettre à jour avant affichage si le carnet de vaccination est toujours valide ?>
                        </div>
                	</fieldset>
                    <?php
                        include("Script_PHP/BDDAccess.php");
                        $requete=$bdd->query('select type from Animal where idAnimal='.$_SESSION['idAnimal']);
                        if($donnees=$requete->fetch())
                            if($donnees['type']=='chien') 
                            echo("
                                    <script>
                                    var textNodes=[
                                        'checkbox',
                                        'Promenade',
                                    ];

                                        var input=document.createElement('input'); 
                                        input.type=textNodes[0];
                                        input.name=textNodes[1];
                                        input.id=textNodes[1];

                                        var label=document.createElement('label');
                                        label.for=textNodes[1];
                                        label.innerHTML=textNodes[1];

    
                                        var br=document.createElement('br');
                                        
                                        var div=document.createElement('div');
                                        div.appendChild(input);
                                        div.appendChild(label);
                                        div.appendChild(br);
                                        div.appendChild(br.cloneNode(false));
                                        
                                        var divInsert=document.querySelector('div#insertion');
                                        
                                        divInsert.appendChild(div);

                                    </script>");
                        ?>

                </form>

