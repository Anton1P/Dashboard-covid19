<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulaire pour récupérer les données de la SAÉ 303</title>
</head>
<body>

<?php
//CONNEXION
    		try {
			$db=new PDO('mysql:host=localhost;dbname=sae303','root','');
		}

		catch (Exception $e)
		{

			die('Erreur : ' . $e->getMessage());
		}		


  //Requête sur les hospitalisations
  $departements=$db -> prepare("SELECT departement_residence  , Libelle_region  FROM donnees_vaccination WHERE departement_residence!='departement_residence'");

  $departements -> execute();

  $departements = $departements -> fetchAll();
?>

	<form action="self_access.php" method="POST">
	<p>
		<label for="dept">Veuillez sélectionner le département qui vous concerne</label>
		<select name="dept">

			<?php
			foreach ($departements as $departement) {
				$numero=$departement['departement_residence'];
				$libelle_dept=$departement['Libelle_region'];
				echo "<option value=$numero>$libelle_dept ($numero)</option>";
			}

			?>

		</select>

	</p>
	<p>
		<input type="submit" value="ENVOYER">
	</p>



	<?php if (isset( $_POST['dept'] ) ) {echo "<p>Vous avez choisi le département".$_POST['dept']; } ?></p>
	