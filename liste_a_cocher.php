<title>Liste des inscrits à l'évènement</title>
<?php
	include("session.php");
	if (!isset($_GET["eid"])){
		echo "Erreur d'eid, vous allez être redirigé.";
		echo "<meta http-equiv='refresh' content='2;event_ferme.php' />";

	}else{
		$SQL = "SELECT p.pid, p.nom, p.prenom, i.valeur, it.nom AS type FROM personnes p, identifications i, itypes it, inscriptions ins WHERE p.pid=i.pid AND i.tid = it.tid AND p.pid=ins.pid AND ins.eid = ? ORDER BY p.pid";
		$st = $db->prepare($SQL);
		$st->execute([$_GET["eid"]]);
		if ($st->rowCount()==0)
		{
			echo "<P>La liste est vide";
			echo "<meta http-equiv='refresh' content='1;event_ferme.php' />";
		}
		else
		{	
?>
<div class="container">
 
        <h1 class = "header1">Liste des inscrits à l'évènement</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                         <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Valeur</th>
                        <th scope="col">Types</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($st as $row)
                        {
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                            <td><?php echo htmlspecialchars ($row['prenom']); ?></td>
                            <td><?php echo htmlspecialchars ($row['valeur']); ?></td>
                            <td><?php echo htmlspecialchars ($row['type']); ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="hidden" name="eid" value="<?php echo $_GET['eid'];?>">
                                    <input type="hidden" name="evenement" value="<?php echo $_GET['event'];?>">
                                    <input type="checkbox" class="custom-control-input" name="pid[]"
                                        value="<?php echo htmlspecialchars($row['pid']);?>">
                                </div>
                            </td>
                    </tr>
                    <?php
                        }
?>

                        <tr>
                            <td><button type="submit" class="btn btn-success"><span
                                        class="glyphicon glyphicon-ok"></span> Valider la participation</button></td>
                        </tr>
                </tbody>
            </table>
</div>
<?php
		}
	}
?>



