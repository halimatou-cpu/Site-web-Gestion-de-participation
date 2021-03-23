<?php
	$page_title = "traitement ajout id personne";
	include("session.php");
	if (!isset($_POST["pid"]) || !isset($_POST["choixId"])|| !isset($_POST["valeur"])) 
	{
		echo "<p>Erreur: pas de pid/tid/valeur</p>\n";
	}
	else
	{
		$pid=$_POST["pid"];
		$tid=$_POST["choixId"];
		$valeur=$_POST["valeur"];
		try
		{
			$SQL = "SELECT COUNT(*) from identifications WHERE pid=? AND tid = ?";
			$st = $db->prepare($SQL);
			$res = $st->execute(array($pid, $tid));
			$res = $st->fetch();
			if($res['COUNT(*)']>=1)
			{
				echo "erreur, cette personne possède déjà un identifiant de ce type.";
			}
			else
			{
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
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='2;ajout_id_per.php' />";
	    exit();
		}
	}
	echo "<meta http-equiv='refresh' content='2;ajout_id_per.php' />";
?>
