 <table id="tabcalendrier">
      	<tr>
      		<th> Catégorie/Date </th>
                <th class="enthaut"> <?php echo date('d/m/y'); ?> </th>
                <th class="enthaut"> <?php
			$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d'));
			$N = 1; 
			$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
			$dansNjours = date('d/m/y', $time);
			echo $dansNjours;
			?> </th>
                <th class="enthaut"> <?php
			$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d'));
			$N = 2; 
			$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
			$dansNjours = date('d/m/y', $time);
			echo $dansNjours;
			?> </th>
                <th class="enthaut"> <?php
			$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d'));
			$N = 3; 
			$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
			$dansNjours = date('d/m/y', $time);
			echo $dansNjours;
			?> </th>
                <th class="enthaut"> <?php
			$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d'));
			$N = 4; 
			$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
			$dansNjours = date('d/m/y', $time);
			echo $dansNjours;
			?> </th>
                <th class="enthaut"> <?php
			$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d'));
			$N = 5; 
			$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
			$dansNjours = date('d/m/y', $time);
			echo $dansNjours;
			?> </th>
     	 	<th class="enthaut"> <?php
			$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d'));
			$N = 6; 
			$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$N, $date['annee']);
			$dansNjours = date('d/m/y', $time);
			echo $dansNjours;
			?> </th>
        </tr>
	<tr>
             	<th class="entcote"> Chien isolé </th>
                    
<?php

	include("BDDAccess.php");

	for ($i=0; $i<=6; $i++) 
	{ 
		$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d')); 
		$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$i, $date['annee']);
		$date = date('y-m-d', $time);
							
?>		
		<td>
<?php			
			$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = 'chien' AND isolé = 1 AND :recherche BETWEEN dateDebut AND dateFin");
			$requete->execute(array(
					'recherche'=>$date));
			$nombre = $requete->fetch();
			$j = 10 - $nombre[0];
								
			echo $j;
?>		
		</td>
<?php	} 
?>
	</tr>
	<tr>
		<th class="entcote"> Chien en groupe </th>
<?php

	for ($i=0; $i<=6; $i++) 
	{ 
		$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d')); 
		$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$i, $date['annee']);
		$date = date('y-m-d', $time);
							
?>		
		<td>
<?php			
			$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = 'chien' AND isolé = 0 AND :recherche BETWEEN dateDebut AND dateFin");
			$requete->execute(array(
					'recherche'=>$date));
			$nombre = $requete->fetch();
			$j = 30 - $nombre[0];
								
			echo $j;
?>		
		</td>
<?php	} 
?>
	</tr>
	<tr>
		<th class="entcote"> Chat isolé </th>
<?php

	for ($i=0; $i<=6; $i++) 
	{ 
		$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d')); 
		$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$i, $date['annee']);
		$date = date('y-m-d', $time);
							
?>		
		<td>
<?php			
			$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = 'chat' AND isolé = 1 AND :recherche BETWEEN dateDebut AND dateFin");
			$requete->execute(array(
					'recherche'=>$date));
			$nombre = $requete->fetch();
			$j = 10 - $nombre[0];
								
			echo $j;
?>		
		</td>
<?php	} 
?>
	</tr></tr>
	<tr>
		<th class="entcote"> Chat en groupe </th>
<?php

	for ($i=0; $i<=6; $i++) 
	{ 
		$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d')); 
		$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$i, $date['annee']);
		$date = date('y-m-d', $time);
							
?>		
		<td>
<?php			
			$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = 'chat' AND isolé = 0 AND :recherche BETWEEN dateDebut AND dateFin");
			$requete->execute(array(
					'recherche'=>$date));
			$nombre = $requete->fetch();
			$j = 42 - $nombre[0];
								
			echo $j;
?>		
		</td>
<?php	} 
?>
	</tr></tr>
	<tr>
		<th class="entcote"> Rongeur isolé </th>
<?php

	for ($i=0; $i<=6; $i++) 
	{ 
		$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d')); 
		$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$i, $date['annee']);
		$date = date('y-m-d', $time);
							
?>		
		<td>
<?php			
			$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = 'rongeur' AND isolé = 1 AND :recherche BETWEEN dateDebut AND dateFin");
			$requete->execute(array(
					'recherche'=>$date));
			$nombre = $requete->fetch();
			$j = 5 - $nombre[0];
								
			echo $j;
?>		
		</td>
<?php	} 
?>
	</tr></tr>
	<tr>
		<th class="entcote"> Rongeur en groupe </th>
<?php

	for ($i=0; $i<=6; $i++) 
	{ 
		$date = array('annee'=>date('y'), 'mois'=>date('m'), 'jour'=>date('d')); 
		$time = mktime(00, 00, 00, $date['mois'], $date['jour']+$i, $date['annee']);
		$date = date('y-m-d', $time);
							
?>		
		<td>
<?php			
			$requete = $bdd->prepare("SELECT count(*) FROM Reservation JOIN Animal USING (idAnimal) WHERE type = 'rongeur' AND isolé = 0 AND :recherche BETWEEN dateDebut AND dateFin");
			$requete->execute(array(
					'recherche'=>$date));
			$nombre = $requete->fetch();
			$j = 18 - $nombre[0];
								
			echo $j;
?>		
		</td>
<?php	} 
?>
	</tr>
</table>
