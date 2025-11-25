<?php 
$connexion = getConnexionBD(); // connexion à la BD

if(isset($_POST['boutonValider'])) {
	
	$table	= mysqli_real_escape_string($connexion, $_POST['champRech']);

	if($_POST['champRech']=="VARIETES") {
		$resultatsV= search($connexion, $table);
		if(empty($resultatsV)) {
			$message = "Aucun résultat pour cette valeur !";
		}
	}
	if($_POST['champRech']=="PLANTE") {
		$resultatsP= search($connexion, $table);
		if(empty($resultatsP)) {
			$message = "Aucun résultat pour cette valeur !";
		}
	}
	if($_POST['champRech']=="typePL") {
		$resultatsT= search($connexion, $table);
		if(empty($resultatsT)) {
			$message = "Aucun résultat pour cette valeur !";
		}
	}
}

?>

