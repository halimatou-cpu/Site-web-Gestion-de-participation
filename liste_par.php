<title>Liste des personnes ayant participé à l'événement</title>
<?php
	include("session.php");

	if(!isset($_GET["eid"]))
	{
		echo "erreur dans l'eid.";
		echo "<meta http-equiv='refresh' content='2;liste_par_event.php' />";

	}
	else
	{
		$SQL = "SELECT pa.ptid, e.eid, e.intitule, pa.date, pe.nom, pe.prenom, i.valeur, it.nom AS itnom FROM personnes pe, participations pa, evenements e, identifications i, itypes it WHERE e.eid = ? AND e.eid = pa.eid AND pa.pid = pe.pid AND i.pid = pe.pid AND it.tid = i.tid ORDER BY pa.ptid DESC";
		$st = $db->prepare($SQL);
		$st->execute([$_GET["eid"]]);
		if ($st->rowCount()==0)
		{
		echo "<P>La liste est vide";
		echo "<meta http-equiv='refresh' content='1;liste_par_event.php' />";
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
                        <th scope="col">Date</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($st as $row)
                        {
?>
                    <tr class="active">
                       <td><?php echo htmlspecialchars($row['intitule']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($row['valeur']); ?></td>
                        <td><?php echo htmlspecialchars($row['itnom']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <!-- <td><?php echo htmlspecialchars($row['description']); ?></td> -->
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



