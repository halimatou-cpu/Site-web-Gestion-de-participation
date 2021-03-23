<?php
	$page_title = "Traitement modification mot de passe";
	include("session.php");
	if (!isset($_POST["uid"])) 
	{
		echo "<p>Erreur: pas d'uid</p>\n";
	}
	else
	{	
		$passwordFunction =
		function ($s) {
			return password_hash($s, PASSWORD_DEFAULT);
		};

		$uid = $_POST["uid"];
		try
		{
			$SQL = "SELECT * FROM users WHERE uid=:uid";
			$st = $db->prepare($SQL);
			$st->execute(['uid'=>"$uid"]);
			$row = $st->fetch();
			if ($st->rowCount() ==0) 
			{
				echo "<p>Erreur dans uid</p>\n";
			}
			else 
			{	
				$password = $passwordFunction($_POST["psw"]);
				$SQL = "UPDATE users SET mdp=? WHERE uid=?";
				$stmt = $db->prepare($SQL);
				$res = $stmt->execute(array($password, $uid));
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
	    echo "<meta http-equiv='refresh' content='1;mod_uti.php' />";
	    exit();
		}						
	}
	echo "<meta http-equiv='refresh' content='1;mod_uti.php' />";
?>
