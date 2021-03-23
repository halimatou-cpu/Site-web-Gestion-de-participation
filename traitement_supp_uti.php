<?php
	$page_title = "Traitement Suppression utilisateur";
	include("session.php");
	
	if (!isset($_POST["uid"])) 
	{
		echo "<p>Erreur: pas d'uid</p>\n";
	}
	else
	{
		try
		{

			$SQL = "DELETE FROM users WHERE uid=?";
			$st = $db->prepare($SQL);
			$st->execute([$_POST["uid"]]);
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
	    echo "<meta http-equiv='refresh' content='2;supp_uti.php' />";
	    exit();
		}	
	}
	echo "<meta http-equiv='refresh' content='1;supp_uti.php' />";
?>
