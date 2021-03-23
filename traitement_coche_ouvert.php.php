<?php
	$page_title = "Traitement liste ouverte à tiquer";
	include("session.php");
	try{
		$eid = $_POST['eid'];
		$SQL = "SELECT COUNT(*) FROM evenements WHERE eid=?";
		$st = $db->prepare($SQL);
		$res = $st->execute(array($eid));
		$res = $st-> fetch();
		if($res['COUNT(*)']<1)
		{
			echo "Erreur, l'eid n'existe pas. ";
			echo "<meta http-equiv='refresh' content='2;event_ouvert.php' />";
		}
		else
		{
			if(!isset($_POST['pid']))
			{
		   		echo "Vous n'avez coché personne.";
				echo "<meta http-equiv='refresh' content='1;liste_a_cocher_ouvert.php?eid=".$eid."'/>";
			}
			else
			{
				
				$datetime = date("Y-m-d H:i:s");
				foreach($_POST['pid'] as $valeur)
				{
		  			$SQL = "INSERT INTO participations (`ptid`, `pid`, `eid`,`date`,`uid`) VALUES (DEFAULT,?,?,?,?)";
					$st = $db->prepare($SQL);
					$res = $st->execute(array($valeur, $eid, $datetime, $idm->getUid()));
					if (!$res)// ou if ($st->rowCount() ==0)}
					{
						echo "Erreur d’ajout";
					}
				}
				echo "Les ajouts ont été effectués";
			}
		}
	} 
	catch (\PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    echo "<meta http-equiv='refresh' content='2;event_ouvert.php' />";
    exit();

	}

	echo "<meta http-equiv='refresh' content='1;liste_par.php?eid=".$eid."'/>";
		
	
?>