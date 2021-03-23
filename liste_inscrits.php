<title>Liste des inscrits à l'événement</title>
<?php
	include("session.php");
	if(!isset($_GET["eid"]))
	{
		echo "erreur dans l'eid.";
		echo "<meta http-equiv='refresh' content='2;liste_event.php' />";
	}
	else
	{
		$SQL = "SELECT P.pid, P.nom, P.prenom, ID.valeur, ID.tid, E.eid, E.intitule, I.eid, IT.nom AS itnom FROM personnes P, identifications ID, itypes IT, inscriptions I, evenements E WHERE P.pid = ID.pid AND ID.tid = IT.tid AND I.pid = P.pid AND E.eid = I.eid AND I.eid=?";
		$st = $db->prepare($SQL);
		$st->execute([$_GET["eid"]]);
		if ($st->rowCount()==0)
		{
		echo "<P>La liste est vide";
		echo "<meta http-equiv='refresh' content='1;liste_event.php' />";
		}
		else
		{	
?>
<div class="container">
 
        <h1 class = "header1">Liste des personnes ayant participé à l'événement</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Evénement</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Valeur</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($st as $row)
                        {
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['intitule'])?></td>
                        <td><?php echo htmlspecialchars($row['nom'])?></td>
                        <td><?php echo htmlspecialchars($row['prenom'])?></td>
                        <td><?php echo htmlspecialchars($row['valeur'])?></td>
                        <td><?php echo htmlspecialchars($row['itnom'])?></td>
                    </tr>
                    <?php
                        }
?>
                </tbody>
            </table>
</div>
<?php
		}
	}
?>



