<?php
	$page_title = "Traitement suppression id";
	include("session.php");
	if (!isset($_POST["tid"])) 
	{
		echo "<p>Erreur: pas de tid</p>\n";
	}
	else
	{
		try
		{
			$SQL = "DELETE FROM itypes WHERE tid=?";
			$st = $db->prepare($SQL);
			$st->execute([$_POST["tid"]]);
			if (!$st || $st->rowCount() ==0) // ou if ($st->rowCount() ==0)
			{	
				echo "<p>Erreur de suppression</p>\n";
			}
			else
			{
				echo "<p>La suppression a été effectuée</p>";
			}
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='2;supp_id.php' />";
	    exit();
		}	
	}
	echo "<meta http-equiv='refresh' content='1;supp_id.php' />";
?>
