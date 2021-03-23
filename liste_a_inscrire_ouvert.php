<title>Liste des personnes à inscrire à l'événement ouvert</title>
<?php
	include("session.php");
	if(!isset($_GET["eid"]))
	{
		echo "erreur dans l'eid.";
		echo "<meta http-equiv='refresh' content='1;liste_event_ouverts_inscription.php' />";
	}
	else
	{
		$SQL = "SELECT pid, nom, prenom FROM personnes WHERE pid NOT IN (SELECT pid FROM inscriptions WHERE eid=?)";
		$st = $db->prepare($SQL);
		$st->execute([$_GET["eid"]]);
		if ($st->rowCount()==0)
		{
			echo "<P>La liste est vide";
			echo "<meta http-equiv='refresh' content='1;liste_event_fermes_inscription.php' />";
		}
		else
		{	
?>
<div class="container">
 
        <h1 class = "header1">Liste des personnes à inscrire à l'événement ouvert</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                         <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                    </tr>
                </thead>

                <tbody>
                    <form action="traitement_a_inscrire_ouvert.php" method="post">
                    <?php
                        foreach($st as $row)
                        {
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                            <td><?php echo htmlspecialchars ($row['prenom']); ?></td>
                            <td>
                                <div class="form-check">
                                    <input type="hidden" name="eid" value="<?php echo $_GET['eid'];?>">
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
                                        class="glyphicon glyphicon-ok"></span> Valider l'inscription</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>
</div>


<?php
		}
	}
?>



