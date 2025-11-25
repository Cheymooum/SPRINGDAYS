<?php 

// connexion à la BD, retourne un lien de connexion
function getConnexionBD() {
	$connexion = mysqli_connect(SERVEUR, UTILISATRICE, MOTDEPASSE, BDD);
	if (mysqli_connect_errno()) {
	    printf("Échec de la connexion : %s\n", mysqli_connect_error());
	    exit();
	}
	return $connexion;
}

// déconnexion de la BD
function deconnectBD($connexion) {
	mysqli_close($connexion);
}

// nombre d'instances d'une table $nomTable (page STATISTIQUE)
function countInstances($connexion, $nomTable) {
	$requete = "SELECT COUNT(*) AS nb FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	if($res != FALSE) {
		$row = mysqli_fetch_assoc($res);
		return $row['nb'];
	}
	return -1;  // valeur négative si erreur de requête (ex, $nomTable contient une valeur qui n'est pas une table)
}
// retourne les instances d'une table
function getInstances($connexion, $nomTable) {
	$requete = "SELECT * FROM $nomTable";
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}
// insère une nouvelle variété 
function insertV($connexion, $nomV, $anneeV, $precocite, $descriptionSemis, $plantation, $entretien, $recolteV, $nbjourlevee, $commentaireV, $debutMEP, $finMEP, $debutRecolte, $finRecolte,$nomPl) {
	$requete = "INSERT INTO VARIETES (nomV, anneeV, precocite, descriptionSemis, plantation, entretien, recolteV, nbjourlevee, commentaireV, debutMEP, finMEP, debutRecolte, finRecolte,nomPl)
	VALUES ('$nomV','$anneeV','$precocite','$descriptionSemis','$plantation','$entretien','$recolteV','$nbjourlevee','$commentaireV','$debutMEP','$finMEP','$debutRecolte','$finRecolte','$nomPl')";
	//echo $requete;
	$res = mysqli_query($connexion, $requete);
	return $res;
}
	

//retourne les résultats d'une recherche
function search($connexion, $table) {
	if($table == 'VARIETES')
		$requete = 'SELECT DISTINCT * FROM VARIETES';
	elseif ($table == 'PLANTE') //
		$requete = 'SELECT DISTINCT nomPl, nomlatinPL, catégoriePL FROM PLANTE';
	else $requete = 'SELECT DISTINCT nomPl,typePL, soustypePL FROM PLANTE';
	echo $requete;
	$res = mysqli_query($connexion, $requete);
	$instances = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $instances;
}


// retourne les instances de nomV // afficher

function getVarietesByName($connexion, $nomV) {
	$nomV = mysqli_real_escape_string($connexion, $nomV); // au cas où $nomV provient d'un formulaire
	$requete = "SELECT * FROM VARIETES WHERE nomV = '". $nomV . "'";
	$res = mysqli_query($connexion, $requete);
	$variete = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $variete;

}
// retourne le Top-5 des parcelles avec le plus de rangs
function getTop5parcelles($connexion, $RANG) {
	$requete ="SELECT idPa FROM $RANG ORDER BY (SELECT MAX(idRa) FROM RANG ) DESC LIMIT 5 ";
		$res = mysqli_query($connexion, $requete);
	if($res != FALSE) {
		$top5 = mysqli_fetch_all($res, MYSQLI_ASSOC);
		return $top5;
	}
	return -1;  // valeur négative si erreur de requête
}
/*fonction qui renvoie $nbVAleatoire variétés de plantes aléatoirement*/
function ChoixVarieteAleatoire ($connexion, $nbVariete) {
	$nbVariete = mysqli_real_escape_string($connexion, $nbVariete);
	$requete = "SELECT * FROM VARIETES ORDER BY rand() LIMIT $nbVariete";
	//echo $requete;
	//on envoie la requête à la BD avec mysqli_query
	$res = mysqli_query($connexion, $requete);
	$varietes = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $varietes;
}

//fonction qui renvoie $nbSauvage variétés de plantes sauvage aléatoirement
function ChoixPlanteSauvageAleatoire ($connexion, $nbSauvage) {
	$nbSauvage = mysqli_real_escape_string($connexion, $nbSauvage);
	$requete = "SELECT * FROM PLANTE WHERE catégoriePL LIKE 'sauvage%' ORDER BY rand() LIMIT $nbSauvage";
	//echo $requete;
	//on envoie la requête à la BD avec mysqli_query
	$res = mysqli_query($connexion, $requete);
	$sauvages = mysqli_fetch_all($res, MYSQLI_ASSOC);
	return $sauvages;

}
//retourne l'idPa de chaque parcelles

	function getParcellesById($connexion, $idPa){

		$requete = "SELECT * FROM PARCELLES WHERE idPa = '$idPa' ";
		$res= mysqli_query($connexion, $requete);
		$parcelles = mysqli_fetch_all($res, MYSQLI_ASSOC);
		return $parcelles;
	}
	
//insere une nouvelle parcelle
	function insertP($connexion, $idPa) {
	$requete = "INSERT INTO PARCELLES (idPa) VALUES ('$idPa')";
	//echo $requete;
	$res = mysqli_query($connexion, $requete);
	return $res;
}
/*fonction qui insert une nouvelle parcelle et un nouveau rang, la requete SQL marche mais il y a une erreur dans le controleur
function insertP($connexion, $idPa,$nbRangMax) {
	$requete = "INSERT INTO PARCELLES (idPa) VALUES ('$idPa');
	INSERT INTO RANG (idPa,idRa) VALUES ('$idPa','$nbRangMax')";
	echo $requete;
	$res = mysqli_query($connexion, $requete);
	return $res;
}*/
	


/* FONCTIONNALITE 4 NON FINIS, mais voici les fonction utilisé pour ajouter ou supprimer un jardin utiliser dans les controleur Ajouterj et SupprimerJ


insère les attributs d'un nouveau jardin dans la BD

	function insertJardin($connexion, $idJ, $nomJ, $surfaceJ,$idJP,$idJO,$idJV){
		$requete= "INSERT INTO JARDINS (idJ, nomJ, SurfaceJ) VALUES ('$idJ', '$nomJ', '$SurfaceJ'); 
		INSERT INTO JORNEMENT (idJ,idJO) VALUES ('$idJ','$idJO');
		INSERT INTO JPOTAGER (idJ,idP) VALUES ('$idJ','$idP');
		INSERT INTO JVERGER(idJ,idJV) VALUES ('$idJ','$idJV');"
		//echo $requete;
		$res =mysqli_query($connexion, $requete);
		return $res;
	}
	
			
		function getJardinById($connexion, $idJ){

		$requete = "SELECT * FROM JARDINS WHERE idJ = '$idJ' ";
		$res= mysqli_query($connexion, $requete);
		//echo $requete;
		//on récupère le résultat dans un tableau
		$jardin = mysqli_fetch_all($res, MYSQLI_ASSOC);
		return $jardin;	
	}
	
//Supprime un jardin dans la BD	
		function deleteJ ($connexion, $idJ) {
		$requete="DELETE FROM JARDINS WHERE idJ = '$idJ'";
		//echo $requete;
		$res =mysqli_query($connexion, $requete);
		return $res;
		}	
		
*/

?>
	