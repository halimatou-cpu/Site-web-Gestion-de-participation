<?php
	$page_title = "Traitement suppression id personne";
	include("session.php");
	if (!isset($_POST["pid"]) || !isset($_POST["tid"])) 
	{
		echo "<p>Erreur: pas de pid/tid</p>\n";
	}
	else
	{  
		try
		{
			$pid=$_POST["pid"];
			$tid=$_POST["tid"];
			
			$SQL = "DELETE FROM identifications WHERE pid = ? AND tid = ?";
			$st = $db->prepare($SQL);
			$res = $st->execute(array($pid,$tid));
			if (!$res)// ou if ($st->rowCount() ==0)}
			{
				echo "Erreur de suppression";
			}
			else
			{
				echo "La suppression a été effectué.";
			}
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='1;supp_id_per.php' />";
	    exit();
		}	
	}
	echo "<meta http-equiv='refresh' content='1;supp_id_per.php' />";
?>
