<h3> Supprimer votre jardin</h3>

<form method="post" action="#">

<label for="idJ" > Selectionner votre jardin à supprimer :  </label>
		<select name="idJ" id="idJ" style="width: 10%"> 
			<?php foreach($Jardin as $Jardins) { ?>
				<option value="<?=$Jardins['idJ']?> </option>
			<?php } ?>
		</select>
	<br></br>

		<input type="submit" style="width: 20%" name="boutonValider" value="Supprimer"/></p>



</form>