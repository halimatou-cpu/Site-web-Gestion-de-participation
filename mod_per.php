<title>Modification d'une personne</title>
<?php
	include("session.php");
	$SQL = "SELECT * FROM personnes ORDER BY pid";
	$res = $db->query($SQL);
	if ($res->rowCount()==0)
	{
	echo "<P>La liste est vide";
	}
	else
	{	
?>
<div class="container">
 
        <h1 class = "header1">Modifier les informations d'une personne</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                         <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($res as $row)
                        {
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['nom']);?></td>
                        <td><?php echo htmlspecialchars ($row['prenom']);?></td>
                        <td><a href="#" id="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#ModPer"
                                onclick="GetNomPrenomTid('<?php echo htmlspecialchars(addslashes($row['pid']));?>','<?php echo htmlspecialchars(addslashes($row['nom']));?>','<?php echo htmlspecialchars(addslashes($row['prenom']));?>');"><span
                                    class="btn btn-sm btn-warning">Modifier</span></a></td>
                    </tr>
                    <?php
                        }
?>
                </tbody>
            </table>
</div>
<div class="modal fade" id="ModPer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                Modifiez le nom et le prénom de cette personne
            </div>
            <div class="modal-footer" align="center">
                <form method="post" action="traitement_mod_per.php">
                    <table>
                        <input type='hidden' name="pid" value='' id='ref_id_bouton'>
                        <tr>
                            <td><label for="inputNom" class="control-label">Nom</label></td>
                            <td><input type="text" name="ModNom" class="form-control" id="ModNom" placeholder="nom"
                                    required maxlength="25"></td>
                        </tr>
                        <tr>
                            <td><label for="inputPrenom" class="control-label">Prénom</label></td>
                            <td><input type="text" name="ModPrenom" class="form-control" id="ModPrenom"
                                    placeholder="prenom" required maxlength="24"></td>
                        </tr>

                    </table>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
	}
?>




