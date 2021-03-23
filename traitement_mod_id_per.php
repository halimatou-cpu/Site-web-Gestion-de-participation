<?php
	$page_title = "Traitement modification id personne";
	include("session.php");
	if (!isset($_POST["pid"]) || !isset($_POST["tid"])) 
	{
		echo "<p>Erreur: pas de pid/tid</p>\n";
	}
	else
	{
		if(!isset($_POST["valeur"]))
		{
			echo "<p>Erreur: pas de valeur</p>\n";
		}
		else
		{
			$pid=$_POST["pid"];
			$tid=$_POST["tid"];
			$valeur=$_POST["valeur"];
			try
			{	
				$SQL = "UPDATE identifications SET valeur=? WHERE pid=? AND tid=?";
				$st = $db->prepare($SQL);
				$res = $st->execute(array($valeur,$pid,$tid));
				if (!$res)// ou if ($st->rowCount() ==0)}
				{
					echo "Erreur de modification";
				}
				else
				{
					echo "La modifcation a été effectué.";
				}
			}
			catch (\PDOException $e) 
			{
		    http_response_code(500);
		    echo "Erreur de serveur.";
		    echo "<meta http-equiv='refresh' content='1;mod_id_per.php' />";
		    exit();
			}	
		}
	}
	echo "<meta http-equiv='refresh' content='1;mod_id_per.php' />";
?>
