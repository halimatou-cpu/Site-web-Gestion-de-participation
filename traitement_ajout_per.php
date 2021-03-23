<?php
	$page_title = "Traitement ajout personne";
	include("session.php");
	if (!isset($_POST["nom"]) || !isset($_POST["prenom"]))
	{
		echo "Erreur: pas de nom/prénom.";
	}
	else
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$valeur1 = $nom." ".$prenom;
		if (!isset($_POST["valeur"]) || !isset($_POST["choixId"])) 
		{	
			try
			{
				$SQL = "INSERT INTO personnes (`pid`, `nom`, `prenom`) VALUES (DEFAULT, ?, ?)";
				$st = $db->prepare($SQL);
				$res = $st->execute(array($nom, $prenom));
				$pid = $db->lastInsertId();
				if (!$res)// ou if ($st->rowCount() ==0)}
				{
					echo "Erreur d’ajout";
				}
				else
				{
					echo "L'ajout a été effectué.";
				}
				$SQL = "INSERT INTO identifications (`pid`, `tid`, `valeur`) VALUES (?, ?, ?)";
				$st = $db->prepare($SQL);
				$res = $st->execute(array($pid, 4, $valeur1));
				if (!$res)// ou if ($st->rowCount() ==0)}
				{
					echo "Erreur d’ajout";
				}
				else
				{
					echo "L'ajout a été effectué.";
				}
			}
			catch (\PDOException $e) 
			{
		    http_response_code(500);
		    echo "Erreur de serveur.";
		    echo "<meta http-equiv='refresh' content='1;ajout_per.php' />";
		    exit();
			}

		}
		else
		{
			$tid=$_POST["choixId"];
			$valeur=$_POST["valeur"];
			try
			{
				$SQL = "INSERT INTO personnes (`pid`, `nom`, `prenom`) VALUES (DEFAULT, ?, ?)";
				$st = $db->prepare($SQL);
				$res = $st->execute(array($nom, $prenom));
				$pid = $db->lastInsertId();
				if (!$res)// ou if ($st->rowCount() ==0)}
				{
					echo "Erreur d’ajout";
				}
				else
				{
					echo "L'ajout a été effectué.";
				}

				$SQL = "INSERT INTO identifications (`pid`, `tid`, `valeur`) VALUES (?, ?, ?)";
				$st = $db->prepare($SQL);
				$res = $st->execute(array($pid, $tid, $valeur));
				if (!$res)// ou if ($st->rowCount() ==0)}
				{
					echo "Erreur d’ajout";
				}
				else
				{
					echo "L'ajout a été effectué.";
				}
			}
			catch (\PDOException $e) 
			{
		    http_response_code(500);
		    echo "Erreur de serveur.";
		    echo "<meta http-equiv='refresh' content='1;ajout_per.php' />";
		    exit();
			}
		}
	}
	echo "<meta http-equiv='refresh' content='1;ajout_per.php' />";
		
?>
