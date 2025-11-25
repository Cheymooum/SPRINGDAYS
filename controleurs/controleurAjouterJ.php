<?php 


if(isset($_POST['boutonValiderJ'])) { // formulaire du jardin soumis
	//on récupère les valeurs saisies lors du formulaire dans des variables (avec la fonction qui protège des caractères spéciaux )
		$nomJ = mysqli_real_escape_string($connexion, $_POST['nomJ']);
		$surfaceJ = mysqli_real_escape_string($connexion, $_POST['surfaceJ']);

//générer une valeur aléatoire pour le jardin
$idJ = mt_rand(1,500);

//appel à la fonction qui vérifie si un jardin avec le même identifiant existe déjà
	$verification = getJardinById($connexion, $idJ);

	if($verification == FALSE || count($verification) == 0) { // pas de jardin existant avec cet identifiant alors insertion
		$insertionJ = insertJardin($connexion, $nomJ, $surfaceJ,$idJP,$idJO,$idJV);

		if ($insertionJ == TRUE){

				$messageJ = "Votre jardin a été ajouté";
			}
			else {

				$messageJ = "Erreur lors de l'insertion du jardin";
			}
	}

	else {

		$messageJ = "Ce jardin existe déjà";
		}
}


?>