<?php 
if(isset($_POST['boutonValider'])) { // formulaire soumis
	//on récupère les valeurs saisies lors du formulaire dans des variables (avec la fonction qui protège des caractères spéciaux )
	$nbRangMin = mysqli_real_escape_string($connexion, $_POST['nbRangMin']);
	$nbRangMax = mysqli_real_escape_string($connexion, $_POST['nbRangMax']);
	$pourcentageVarieteCultivee= mysqli_real_escape_string($connexion, $_POST['$pourcentageVarieteCultivee']);
	$pourcentageVarieteSauvage= mysqli_real_escape_string($connexion, $_POST['$pourcentageVarieteSauvage']);
	$idPa= mysqli_real_escape_string($connexion, $_POST['idPa']);
	//echo$pourcentageVarieteCultivee;
	//echo$pourcentageVarieteSauvage;
if ($pourcentageVarieteCultivee + $pourcentageVarieteSauvage <= 100){
		//Si la même valeur n est saisie pour le minimum et pour le maximum, cela signifie que la parcelle doit avoir n rangs ;
			if ($nbRangMax == $nbRangMin) {
				$nbRang =$nbRangMax;
				//echo $nbRang;
				}
			elseif($nbRangMax<$nbRangMin){
				$message = "le min inseré est plus grand que le max ";
				}
			else {
				$nbRang= $nbRangMax;
				//echo $nbRang;
				}
				
	}
	//Erreur sur le % ;
else if ($pourcentageVarieteCultivee + $pourcentageVarieteSauvage > 100){
		$message = "ERREUR,rentrez des valeurs dont la somme est inférieure à 100";
		}
		
	//la fonction round permet d'arrondir
	//la variable $nbVarieteO récupère le NOMBRE de variétés qui occupe les culture à générer aléatoirement
	$nbVariete = (round ($nbRang* ($pourcentageVarieteCultivee/100)));
	//echo "varc :'$nbVariete'" ;
	
	//la variable $nbSauvage récupère le NOMBRE de plantes sauvages à générer aléatoirement
	$nbSauvage= (round ($nbRang* ($pourcentageVarieteSauvage/100)));
	//echo "varS:'$nbSauvage'";
	
		//la variable $nbRangnonOccupe récupère le NOMBRE de rang non occupe
	$nbRangnonOccupe=(round($nbRang*((100-($pourcentageVarieteCultivee+$pourcentageVarieteSauvage))/100)));
		//echo "rang non occ:'$nbRangnonOccupe'";

	//appel à la fonction qui renvoie nbVarietes et nbSauvage aléatoirement
	if ($nbVariete>=0 && $nbSauvage >=0) {
		$varietesAleatoires = ChoixVarieteAleatoire($connexion, $nbVariete);
		$plantesauvageAleatoire = ChoixPlanteSauvageAleatoire($connexion, $nbSauvage);
	}
	else {
		$message = "Vous devez indiquer un pourcentage et un nombre de rang";
	}

		
	//appel à la fonction qui vérifie que idPa existe déjà
	$verification = getParcellesById($connexion, $idPa);

	if ($verification == FALSE || (count($verification)==0)){ // pas de parcelle avec cette identifiant
		$insertion = insertP($connexion, $idPa,$nbRangMax);
			if ($insertion == TRUE){
				$messageP = "La parcelle $idPa a bien été ajoutée !";
			}
			else {
				$messageP = "Erreur lors de linsertion de la parcelle $idPa ";
			}
	}
	else {

		$messageP = "la parcelle $idPa existe déjà";
	}
}	