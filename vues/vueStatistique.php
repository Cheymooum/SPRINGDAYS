
<?php if(isset($messageVariete)) { ?>
	<p> <?= $messageVariete ?></p>
<?php } ?>

<?php if(isset($messagePlante)) { ?>
	<p> <?= $messagePlante ?></p>
<?php } ?>


<?php if(isset($messageJardin)) { ?>
	<p> <?= $messageJardin ?></p>
<?php } ?>

<?php if(isset($messageParcelle)) { ?>
	<p> <?= $messageParcelle ?></p>
<?php } ?>

<?php if(isset($messageTop5Parcelles )) { ?>
	<p> <?= $messageTop5Parcelles ?></p>
	<ul>
		<?php foreach($top5Parcelles as $top5Parcelle) { ?>
		<li><?= $top5Parcelle['idPa'] ?></li>
		<?php } ?>
	</ul>
<?php } ?>






