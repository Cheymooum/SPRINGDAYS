<?php

/* 
** Il est possible d'automatiser le routing, notamment en cherchant directement le fichier controleur et le fichier vue.
** ex, pour page=afficher : verification de l'existence des fichiers controleurs/controleurAfficher.php et vues/vueAfficher.php
** Cela impose un nommage strict des fichiers.
*/

$routes = array(
	'ajouter' => array('controleur' => 'controleurAjouter', 'vue' => 'vueAjouter'),
	'rechercher' => array('controleur' => 'controleurRechercher', 'vue' => 'vueRechercher'),
	'Statistiques' => array('controleur' => 'controleurStatistique', 'vue' => 'vueStatistique'),
	'Generer' => array('controleur' => 'controleurGenerer', 'vue' => 'vueGenerer'),
	'AjouterJ'=>array('controleur'=>'controleurAjouterJ', 'vue'=> 'vueAjouterJ'),
	'SupprimerJ'=>array('controleur'=>'controleurSupprimerJ', 'vue'=> 'vueSupprimerJ')

);
?>
