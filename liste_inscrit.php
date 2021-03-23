<title>Liste des inscrits aux événements</title>
<?php
	include("session.php");
	$SQL = "SELECT P.pid, E.eid, P.nom, P.prenom, E.intitule FROM personnes P, inscriptions I, evenements E WHERE P.pid = I.pid AND I.eid = E.eid AND (I.pid, I.eid) NOT IN (SELECT PA.pid, PA.eid FROM participations PA) ORDER BY E.eid";
	$res = $db->query($SQL);
	if ($res->rowCount()==0)
	{
	echo "<P>La liste est vide";
	}
	else
	{	
?>
<div class="container">
 
        <h1 class = "header1">Liste des personnes ayant participé à l'événement</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                         <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Intitulé</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($res as $row)
                        {
?>
                    <tr class="active">
                         <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['prenom']); ?></td>
                        <td><?php echo htmlspecialchars($row['intitule']); ?></td>
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



