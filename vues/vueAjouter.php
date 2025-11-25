<h2>Ajout d'une variété</h2>

<form method="post" action="#">
	<label for="nomV">Nom de la variété: </label>
	<input type="text" name="nomV" id="nomV" placeholder="Ajouter le nom d'une variété"required />
	<br/><br/>
	
	<label for="anneeV">Année de mise sur le marché: </label>
		<input type="number" min="1900" max="2099" step="1" name="anneeV" id="anneeV" placeholder="Ajoutez l'année de mise sur le maché" required />
		<br/><br/>
		
	<label for="precocite">Précocité: </label>
		<select name="precocite" id="precocite" required>
			<option value="1 mois"> 1 </option>
			<option value="2 mois"> 2 </option>
			<option value="3 mois"> 3 </option>
			<option value="4 mois"> 4 </option>
			<option value="5 mois"> 5 </option>
			<option value="6 mois"> 6 </option>
			<option value="7 mois"> 7 </option>
			<option value="8 mois"> 8 </option>
			<option value="9 mois"> 9 </option>
			<option value="10 mois"> 10 </option>
			<option value="11 mois"> 11 </option>
			<option value="12 mois"> 12 </option>
		</select> mois
	<br/><br/>

	<label for="descriptionSemis">Description pour le semis: </label>
		<input type="text" name="descriptionSemis" id="descriptionSemis" placeholder="Ajoutez une description pour le semis de la variété" />
		<br/><br/>

	<label for="plantation"> Informations sur la plantation de la variété: </label>
		<input type="text" name="plantation" id="plantation" placeholder="Ajoutez des informations sur la plantation de la variété" required />
		<br/><br/>

	<label for="entretien"> Informations sur l'entretien de la variété: </label>
		<input type="text" name="entretien" id="entretien" placeholder="Ajoutez des informations sur l'entretien de la variété" required />
		<br/><br/>

	<label for="recolteV"> Informations sur la récolte de la variété: </label>
		<input type="text" name="recolteV" id="recolteV" placeholder="Ajoutez des informations sur la récolte de la variété" required />
		<br/><br/>

	<label for="nbjourlevee">Informations sur le nombres de jours de levée de la variété: </label>
		<input type="text" name="nbjourlevee" id="nbjourlevee" placeholder="Ajoutez de combien de jours de levée la variété a besoin"/>
		<br/><br/>

	<label for="commentaireV">Commentaire général pour la variété: </label>
		<input type="text" name="commentaireV" id="commentaireV" placeholder="Ajoutez un commentaire général"/>
		<br/><br/>

	<label for="debutMEP">Date de début de mise en place de la variété: </label>
		<input type="date" name="debutMEP" id="debutMEP" placeholder= "Ajoutez une date de début de mise en place"/>
		<br/><br/>

	<label for="finMEP">Date de fin de mise en place de la variété: </label>
		<input type="date" name="finMEP" id="finMEP" placeholder="Ajoutez une date de fin de mise en place" />
		<br/><br/>

	<label for="debutRecolte">Date de début de récolte de la variété: </label>
		<input type="date" name="debutRecolte" id="debutRecolte" placeholder="Ajoutez une date de début de récolte" />
		<br/><br/>

	<label for="finRecolte"> Date de fin de récolte de la variété: </label>
		<input type="date" name="finRecolte" id="finRecolte" placeholder="Ajoutez une date de fin de récolte" />
		<br/><br/>
		
	<label for="nomPl">Nom de la plante: </label>
	<select name="nomPl" id="nomPl"> 
			<?php foreach($Plantes as $plante) { ?>
				<option value="$nomPl"><?= $plante['nomPl'] ?></option>
			<?php } ?>
			

	</select>
	<br/><br/>
		<label for="nomS">Nom du Semencier: </label>
	<select name="nomS" id="nomS"> 
			<?php foreach($Semenciers as $Semencier) { ?>
				<option value="$nomS"><?= $Semencier['nomS'] ?></option>
			<?php } ?>
			

	</select>
	<br/><br/>
		<label for="typeSol"> Type de sol: </label>
	<select name="typeSol" id="typeSol"> 
			<?php foreach($Typesols as $Typesol) { ?>
				<option value="$typeSol"><?= $Typesol['typeSol'] ?></option>
			<?php } ?>

	</select>
		<br/><br/>
	

	
<input type="submit" name="boutonValider" value="Ajouter"/>
</form>

<?php if(isset($message)) { ?>
	<p style="background-color: yellow;"><?= $message ?></p>
<?php } ?>
