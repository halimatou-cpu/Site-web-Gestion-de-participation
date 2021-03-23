<?php
	$page_title = "Traitement à inscrire ouvert";
	include("session.php");
	$eid = $_POST['eid'];
	$SQL = "SELECT COUNT(*) FROM evenements WHERE eid=?";
	$st = $db->prepare($SQL);
	$res = $st->execute(array($eid));
	$res = $st-> fetch();
	if($res['COUNT(*)']<1)
	{
		echo "Erreur, l'eid n'existe pas.";
		echo "<meta http-equiv='refresh' content='2;liste_event_ouverts_inscription.php' />";
	}
	else
	{
		if(!isset($_POST['pid']))
		{
	   		echo "Vous n'avez coché personne";
	   		echo "<meta http-equiv='refresh' content='0;liste_a_inscrire_ouvert.php?eid=".$eid."' />";
		}
		else
		{
			foreach($_POST['pid'] as $valeur)
			{
				try
				{
		  			$SQL = "INSERT INTO inscriptions (`pid`, `eid`, `uid`) VALUES (?,?,?)";
					$st = $db->prepare($SQL);
					$res = $st->execute(array($valeur, $eid, $idm->getUid()));
					if (!$res)// ou if ($st->rowCount() ==0)}
					{
						echo "Erreur d’ajout";
					}
				}
				catch (\PDOException $e) 
				{
			    http_response_code(500);
			    echo "Erreur de serveur.";
			    echo "<meta http-equiv='refresh' content='2;liste_inscrit.php'/>";
			    exit();
				}
				echo "Les ajouts ont été effectués";
			}
			echo "<meta http-equiv='refresh' content='1;liste_inscrit.php'/>";
		}
	}
?>
