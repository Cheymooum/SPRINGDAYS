<h2 id="titreVariete">Generer une parcelle </h2>
<br></br>

<form method="post" action="#">

	<label for="idPa">Nom de la parcelle </label>
	<input type="text" name="idPa" id="idPa" placeholder="Ajouter le nom d'une parcelle"required />
	<br/><br/>

	<label for="nbRang">Nombre de rang </label>
		<input type="number" name="nbRangMin" id="nbRangMin" min= "0" max="1000"  placeholder="min" required />
		<input type="number" name="nbRangMax" id="nbRangMax" min= "0" max="1000"  placeholder="max" required />
		
	<br></br>

	<label for="$pourcentageVarieteCultivee">Pourcentage de rangs occupés par des cultures: </label>
		<input type="number" name="$pourcentageVarieteCultivee" id="$pourcentageVarieteCultivee" min= "0" max="100"  placeholder="$pourcentageVarieteCultivee" required /> % 
	<br></br>

	<label for="$pourcentageVarieteSauvage">Pourcentage de rangs occupés par des plantes sauvages: </label>
		<input type="number" name="$pourcentageVarieteSauvage" id="$pourcentageVarieteSauvage" min= "0" max="100" placeholder="$pourcentageVarieteSauvage" required /> % 
		<br></br>
		<input type="submit" name="boutonValider" value="Ajouter"/></p>
		<br></br>

</form>
<?php if(isset($message)) { ?>
		<p style="background-color: white;"><?= $message ?></p>
	<?php } ?>

<?php if(isset($varietesAleatoires) && isset($plantesauvageAleatoire) && isset($messageP)) {?>
	<p style="background-color:yellow;"><?= $messageP ?></p>
	
	<table class="greenTable" style="height: 253px;" width="539" >
	<caption>PARCELLE: <?=$idPa ?></caption>
	

<tbody>
<tr>
			<?php foreach($varietesAleatoires as $instancesVC) { ?>
				<tr>	<td>	 <?= $instancesVC['nomV'] ?> </td> </tr>
					<?php } ?>
					
			<?php foreach($plantesauvageAleatoire as $instancesVS) { ?>
			<tr><td> <?= $instancesVS['nomPl'] ?> </td></tr>
			<?php } ?>
			
			<?php  for($vide=1; $vide<=$nbRangnonOccupe; $vide++) { ?>
			<tr><td> Non Occupé </td></tr>
			<?php } ?>
</tr>
			
</tbody>

</table>
<?php }  ?>

