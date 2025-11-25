<?php
	$Jardin = getInstances($connexion, "JARDIN");
	if($Jardin == null || count($Jardin) == 0) {
		$message = "Erreur lors de l'insertion";
	}
	
	if(isset($_POST['boutonValider'])) { 
		$idJ = $_POST['idJ'];
		
	//appel à la fonction qui vérifie que le jardin existe
	$verification = getJardinById($connexion, $idJ);
		
		if ( $verification == null ||count($verification)==0){
		
			$message = "Ce jardin n'as pas été crée";
		}
		else {
			
			$sup=supprimeJardin ($connexion, $idJ);

			$message = "Le jardin $idJ a bien été supprimé.";
	
		}

}
?> 