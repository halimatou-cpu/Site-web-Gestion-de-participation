<?php
	$page_title = "Traitement suppression personne";
	include("session.php");
	try
	{
		if (!isset($_POST["pid"])) 
		{
			echo "<p>Erreur: pas de pid</p>\n";
		}
		else
		{
			$SQL = "DELETE FROM personnes WHERE pid=?";
			$st = $db->prepare($SQL);
			$st->execute([$_POST["pid"]]);
			if (!$st || $st->rowCount() ==0) // ou if ($st->rowCount() ==0)
			{	
				echo "<p>Erreur de suppression</p>\n";
			}
			else
			{
				echo "<p>La suppression a été effectuée</p>";
			}
		}
	}
	catch (\PDOException $e) 
	{
    http_response_code(500);
    echo "Erreur de serveur.";
    echo "<meta http-equiv='refresh' content='1;supp_per.php' />";
    exit();
	}
	echo "<meta http-equiv='refresh' content='1;supp_per.php' />";
?>
