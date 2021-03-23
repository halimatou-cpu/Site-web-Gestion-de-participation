<?php
	$page_title = "Traitement ajout personne";
	include("session.php");
	if (!isset($_POST["nom"]) || !isset($_POST["prenom"]) || !isset($_POST["eid"])) 
	{
		echo "Erreur : Pas de nom/prénom/eid.";
		echo "<meta http-equiv='refresh' content='1;event_ouvert.php'/>";
	}
	else
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$valeur1 = $nom." ".$prenom;
		$eid = $_POST['eid'];
		if (!isset($_POST["valeur"]) || !isset($_POST["choixId"])) 
		{	
			try{
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
					echo "L'ajout de la personne été effectué. ";
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
					echo "L'ajout de son identification Nom et Prénom a été effectué. ";
				}

			}catch (\PDOException $e) 
			{
		    http_response_code(500);
		    echo "Erreur de serveur.";
		    echo "<meta http-equiv='refresh' content='1;event_ouvert.php'/>";
		    exit();
			}
		}
		else
		{	
			try{
				$tid=$_POST["choixId"];
				$valeur=$_POST["valeur"];
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
					echo "L'ajout de la personne a été effectué. ";
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
					echo "Ses identifiants ont été ajouté. ";
				}
			}
			catch (\PDOException $e) 
			{
		    http_response_code(500);
		    echo "Erreur de serveur.";
		    echo "<meta http-equiv='refresh' content='1;event_ouvert.php'/>";
		    exit();
			}
		}
		try
		{
			$SQL = "INSERT INTO inscriptions (`pid`, `eid`, `uid`) VALUES (?, ?, ?)";
			$st = $db->prepare($SQL);
			$res = $st->execute(array($pid, $eid, $idm->getUid()));
			if (!$res)// ou if ($st->rowCount() ==0)}
			{
				echo "Erreur d’ajout";
			}
			else
			{
				echo "L'ajout à la table inscriptions a  été effectué.";
			}
			
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='1;event_ouvert.php'/>";
	    exit();
		}

		echo "<meta http-equiv='refresh' content='2;liste_a_cocher_ouvert.php?eid=".$eid."' />";
	}

?>
