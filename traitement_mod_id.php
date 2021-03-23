<?php
	$page_title = "traitement modification id";
	include("session.php");
	if (!isset($_POST["tid"]) || !isset($_POST["ModId"])) 
	{
		echo "<p>Erreur: pas de tid/identification</p>\n";
	}
	else
	{	
		$tid = $_POST["tid"];
		try{
			$SQL = "SELECT * FROM itypes WHERE tid=:tid";
			$st = $db->prepare($SQL);
			$st->execute(['tid'=>"$tid"]);
			$row = $st->fetch();
			if ($st->rowCount() ==0) 
			{
				echo "<p>Erreur dans tid</p>\n";
			}
			else 
			{	
				$ModId = $_POST['ModId'];
				$SQL = "UPDATE itypes SET nom=? WHERE tid=?";
				$stmt = $db->prepare($SQL);
				$res = $stmt->execute(array($ModId, $tid));
				if (!$res) // ou if ($st->rowCount() ==0)
				{
					echo "<p>Erreur de modification</p>";
				}
				else
				{
					echo "<p>La modification a été effectuée</p>";
				} 
			}
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='1;modif_identif.php' />";
	    exit();
		}							
	}
	echo "<meta http-equiv='refresh' content='1;modif_identif.php' />";
?>
