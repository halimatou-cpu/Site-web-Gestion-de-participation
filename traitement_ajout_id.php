<?php
	$page_title = "Accueil";
	include("session.php");
	if(!isset($_POST['AjoutId']))
	{
		echo "Erreur : pas de moyen d'identification.";
	}
	else{
		try{
			$SQL = "INSERT INTO itypes (`tid`, `nom`) VALUES (DEFAULT, ?)";
			$st = $db->prepare($SQL);
			$res = $st->execute(array($_POST['AjoutId']));
			if (!$res)// ou if ($st->rowCount() ==0)}
			{ 
				echo "Erreur d’ajout";
			}
			else
			{
				echo "L'ajout a été effectué.";
			}
		}
		catch (\PDOException $e) 
		{
	    http_response_code(500);
	    echo "Erreur de serveur.";
	    echo "<meta http-equiv='refresh' content='2;ajout_id.php' />";
	    exit();
		}
	}
	echo "<meta http-equiv='refresh' content='1;ajout_id.php' />";
	
?>
