<title>Liste des participants par évènement</title>
<?php
	include("liste_boutons_events.php");	
	$SQL = "SELECT e.eid, e.intitule, pa.date, pe.nom, pe.prenom FROM personnes pe, participations pa, evenements e WHERE e.eid = pa.eid AND pa.pid = pe.pid ORDER BY e.intitule, pa.date DESC, pe.nom";
	$res = $db->query($SQL);
	if ($res->rowCount()==0)
	{
	echo "<P>La liste est vide";
	}
	else
	{	
?>

<div class="container">
 
        <h1 class = "header1">Liste des participants par évènement</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                       <th scope="col">Intitulé</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($res as $row)
                        {
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['intitule']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                    </tr>
                    <?php
                        }
?>
                </tbody>
            </table>
</div>

<?php
	}
?>




