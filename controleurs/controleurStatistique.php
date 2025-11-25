<?php 
//création des variables, pour s'assurer qu'elle prenne type varchar
$messageVariete = "";
$messagePlante = "";
$messageJardin = " ";
$messageTop5Parcelles = " ";
$messageParcelle="";

// récupération du nombre d'instance des Varietes
$nbVariete = countInstances($connexion, "VARIETES");
	if($nbVariete<= 0) {
		$messageVariete = "Aucune variété de plantes n'a été trouvée dans la base de données !";
	}
	else {
		$messageVariete = "Actuellement le site web gère $nbVariete variétés";
	}

//récupération du nombre d'instance des PLANTES
$nbPlante = countInstances($connexion, "PLANTE");
	if($nbPlante <= 0) {
		$messagePlante = "Aucune Plante n'a été trouvée dans la base de données !";
	}
	else {
		$messagePlante = "Actuellement le site web gère $nbPlante plantes";
	}

//récupération du nombre d'instance des Jardins
$nbJardin= countInstances($connexion, "JARDINS");
	if($nbJardin <= 0) {
		$messageJardin= "Aucun jardin individuel n'a été trouvé dans la base de données !";
	}
	else {
		$messageJardin = "Actuellement le site web gère $nbJardin jardins";
	}
	
//récupération du nombre d'instance des Parcelles
$nbParcelle= countInstances($connexion, "PARCELLES");
	if($nbParcelle <= 0) {
		$messageParcelle= "Aucune Parcelles n'a été trouvé dans la base de données !";
	}
	else {
		$messageParcelle = "Actuellement le site web gère $nbParcelle Parcelles";
	}

// récupération des 5 parcelles ayant le plus de rang
$top5Parcelles = getTop5parcelles($connexion, "RANG");
	if($top5Parcelles <= 0) {
		$messageTop5Parcelles = "Aucune parcelles n'a été trouvé dans la base de données !";
	}
	else {
		$messageTop5Parcelles = "Voici les 5 parcelles ayant le plus de rangs: ";
	}

?>



