<?php
	$page_title = "Traitement modification personne";
	include("session.php");
	if (!isset($_POST["pid"])) 
	{
		echo "<p>Erreur: pas de pid</p>\n";
	}
	else
	{	
		$pid = $_POST["pid"];
		try
		{
			$SQL = "SELECT * FROM personnes WHERE pid=:pid";
			$st = $db->prepare($SQL);
			$st->execute(['pid'=>"$pid"]);
			$row = $st->fetch();
			if ($st->rowCount() ==0) 
			{
				echo "<p>Erreur dans pid</p>\n";
			}
			else 
			{	
				if (!isset($_POST['ModNom']) || !isset($_POST['ModPrenom'])) 
				{
					echo "<p>Erreur: pas de nom ou prénom</p>\n";
				} 
				else 
				{
					$ModNom = $_POST['ModNom'];
					$ModPrenom = $_POST['ModPrenom'];
					$SQL = "UPDATE personnes SET nom=?, prenom=? WHERE pid=?";
					$stmt = $db->prepare($SQL);
					$res = $stmt->execute(array($ModNom, $ModPrenom, $pid));
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
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='1;mod_per.php' />";
	    exit();
		}			
	}
	echo "<meta http-equiv='refresh' content='1;mod_per.php' />";
?>
