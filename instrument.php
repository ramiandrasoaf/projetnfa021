<!doctype html>
<html lang="fr">
<head>
    <?php include_once "inc/head_inc.php";?>
<title>Instruments de musique</title>
</head>

<?php include_once "inc/header_inc.php"; ?>
<div class="container-fluid">
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=site_web', 'root', 'root');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$i=0;
	// Si tout va bien, on peut continuer
	// On récupère tout le contenu de la table instruments
	$reponse = $bdd->query('SELECT id_istru, nom, a_propos FROM instruments');
	?>

	<table border = "1">
		<tr>
			<td>id_instru</td>
			<td>nom</td>
			<td>a_propos</td>
		</tr>
	<?php
		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
			echo "<tr>";
			echo "<td>".$donnees['id_instru']."</td>";
			echo "<td>".$donnees['nom']."</td>";
			echo "<td>".$donnees['a_propos']."</td>";
			echo "</tr>";
		}
		$reponse->closeCursor(); // Termine le traitement de la requête
	?>
	</table>
</div>
<?php  include_once "inc/footer_inc.php";?>
<?php include_once "inc/javascript_body_inc.php"; ?>

</body>
</html>