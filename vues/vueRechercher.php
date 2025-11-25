<ul class="titreRecherche" > Recherche dans la base </ul>

<form method="post" action="#">	
	<label for="idChamp">Rechercher dans</label>
	<select name="champRech" id="idChamp">
		<option value="VARIETES">Varietes</option>
		<option value="PLANTE">Plantes</option>
		<option value="typePL">Types</option>
	</select>
	<br/><br/>
	<input type="submit" name="boutonValider" value="Rechercher"/>
</form>


	<?php if(isset($message)) { ?>
		<p style="background-color: white;"><?= $message ?></p>
	<?php } ?>
<?php if(isset($resultatsV)) {?>
	
		<table class="greenTable" style="height: 253px;" width="539">
		<thead>
			<tr>
				<th>Identifiant de la variété</th>
				<th>Nom de la variété</th>
				<th>Année de mise en place sur le marché</th>
				<th>Précocité de la Variété</th>
				<th>Commentaire de la variété</th>
			</tr>
		</thead>
		

 
		<?php foreach($resultatsV as $instances) {  // nombre d'attributs variable dans les résultats (selon la table)?>
		<tbody>
			<tr>
				<th> <?= $instances ['idV'] ?> </td>
				<th> <?= $instances ['nomV'] ?> </td>
				<th> <?= $instances ['anneeV'] ?> </td>
				<th> <?= $instances ['precocite'] ?> </td>
				<th> <?= $instances ['commentaireV'] ?> </td>
			</tr>
		</tbody>
			<?php } ?>
		</table>
			
<?php } ?>

<?php if (isset($resultatsP)) { ?>
	<table class="greenTable" style="height: 253px;" width="539">
		<thead>
			<tr>
			<th>Nom de la plante</th>
			<th>Nom latin</th>
			<th>Catégorie plante</th>
			</tr>
		</thead>
		

 
		<?php foreach($resultatsP as $instances) {  // nombre d'attributs variable dans les résultats (selon la table)?>
			<tbody>
				<tr>
				<th> <?= $instances ['nomPl'] ?> </td>
				<th> <?= $instances ['nomlatinPL'] ?> </td>
				<th> <?= $instances ['catégoriePL'] ?> </td>
				</tr>
			</tbody>
		<?php } ?>
	</table>
	
<?php } ?> 
<?php if(isset($resultatsT)) { ?>
	<table class="greenTable" style="height: 253px;" width="539">
		<thead>
			<tr>
			<th>Nom de la plante</th>
			<th>Type plante</th>
			<th>Sous type plante</th>
			</tr>
		</thead>
		

 
		<?php foreach($resultatsT as $instances) {  // nombre d'attributs variable dans les résultats (selon la table)?>
			<tbody>
				<tr>
				<th> <?= $instances ['nomPl'] ?> </td>
				<th> <?= $instances ['typePL'] ?> </td>
				<th> <?= $instances ['soustypePL'] ?> </td>
				</tr>
			</tbody>
		<?php } ?>
	</table>
<?php } ?>							
