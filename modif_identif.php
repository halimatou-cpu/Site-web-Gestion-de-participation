<title>Modification d'un type d'identification</title>
<?php
	include("session.php");
	$SQL = "SELECT * FROM itypes ORDER BY tid";
	$res = $db->query($SQL);
	if ($res->rowCount()==0)
	{
	echo "<P>La liste est vide";
	}
	else
	{	
?>
<div class="container">
 
        <h1 class = "header1">Modification d'un type d'identification</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tid</th>
                        <th scope="col">Nom</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($res as $row)
                        {
?>
                    <tr class="active">
                       <td><?php echo htmlspecialchars($row['tid']); ?></td>
                        <td><?php echo htmlspecialchars($row['nom']); ?></td>
                        <td><a href="#" id="<?php echo $row['tid']; ?>" data-toggle="modal" data-target="#ModId"
                                onclick="GetValueTid('<?php echo htmlspecialchars(addslashes($row['tid']));?>','<?php echo htmlspecialchars(addslashes($row['nom']));?>');"><span
                                    class="btn btn-sm btn-warning">Modifier</span></a></td>
                    </tr>
                    <?php
                        }
?>
                </tbody>
            </table>
</div>
<div class="modal fade" id="ModId" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                Modifiez ce moyen d'identification
            </div>
            <div class="modal-footer" align="center">
                <form method="post" action="traitement_mod_id.php">
                    <table>
                        <input type='hidden' name="tid" value='' id='ref_id_bouton'>
                        <tr>
                            <td><label for="inputModId" class="control-label">Nom</label></td>
                            <td><input type="text" name="ModId" class="form-control" id="ModId1" placeholder="nom"
                                    required maxlength="40"></td>
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

