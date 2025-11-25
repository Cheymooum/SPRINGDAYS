<?php
//création des variables,pour s'assurer qu'elles prennent type varchar
	$message = " ";
	$Plantes = " ";
	$Semenciers =" ";
	$Typesols =" ";
	
//tableau contenant toustes les instances de plantes des la BD
	$Plantes = getInstances($connexion, "PLANTE");
	if($Plantes  == null || count($Plantes) == 0) {
		$message = "Erreur";
	}
	$Semenciers = getInstances($connexion, "SEMENCIER");
	if($Semenciers  == null || count($Semenciers) == 0) {
		$message = "Erreur";
	}
	$Typesols = getInstances($connexion, "TYPESOL");
	if($Typesols  == null || count($Typesols) == 0) {
		$message = "Erreur";
	}
	
if(isset($_POST['boutonValider'])) { // formulaire soumis

	$nomV = mysqli_real_escape_string($connexion, $_POST['nomV']); // recuperation de la valeur saisie nomv
	$anneeV = mysqli_real_escape_string($connexion, $_POST['anneeV']);// recuperation de la valeur saisie anneeV
	$precocite = mysqli_real_escape_string($connexion, $_POST['precocite']);// recuperation de la valeur saisie precocite
	$descriptionSemis = mysqli_real_escape_string($connexion, $_POST['descriptionSemis']);// recuperation de la valeur saisie descriptionSemis
	$plantation = mysqli_real_escape_string($connexion, $_POST['plantation']);// recuperation de la valeur saisie plantation
	$entretien = mysqli_real_escape_string($connexion, $_POST['entretien']);// recuperation de la valeur saisie entretien
	$recolteV = mysqli_real_escape_string($connexion, $_POST['recolteV']);// recuperation de la valeur saisie recolteV
	$nbjourlevee = mysqli_real_escape_string($connexion, $_POST['nbjourlevee']);// recuperation de la valeur saisie nbjourlevee
	$commentaireV = mysqli_real_escape_string($connexion, $_POST['commentaireV']);// recuperation de la valeur saisie commentaireV
	$debutMEP = mysqli_real_escape_string($connexion, $_POST['debutMEP']);// recuperation de la valeur saisie debutMEP
	$finMEP = mysqli_real_escape_string($connexion, $_POST['finMEP']);// recuperation de la valeur saisie finMEP
	$debutRecolte = mysqli_real_escape_string($connexion, $_POST['debutRecolte']);// recuperation de la valeur saisie debutRecolte
	$finRecolte = mysqli_real_escape_string($connexion, $_POST['finRecolte']);// recuperation de la valeur saisie finRecolte
	$nomPl = mysqli_real_escape_string($connexion, $_POST['nomPl']);// recuperation de la valeur saisie nomPL

	
	
	$verification = getVarietesByName($connexion, $nomV);
	if($verification == FALSE || count($verification) == 0) { // pas de variété avec ce nom, insertion
		$insertion = insertV($connexion, $nomV, $anneeV, $precocite, $descriptionSemis, $plantation, $entretien, $recolteV, $nbjourlevee, $commentaireV, $debutMEP, $finMEP, $debutRecolte, $finRecolte,$nomPl) ;
		if($insertion == TRUE) {
			$message = "La Variété $nomV a bien été ajoutée !";
		}
		else {
			$message = "Erreur lors de l'insertion de la Variété $nomV.";
		}
	}
	else {
		$message = "la Variété existe déjà avec ce nom ($nomV).";
	}


}

?>
