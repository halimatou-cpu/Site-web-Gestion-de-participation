<title>Modification du mot de passe d'un utilisateur</title>
<?php
	include("session.php");
	$SQL = "SELECT * FROM users ORDER BY uid";
	$res = $db->query($SQL);
	if ($res->rowCount()==0)
	{
	echo "<P>La liste est vide";
	}
	else
	{	
?>
<div class="container">
    <fieldset>
        <legend align="center">Modification du mot de passe d'un utilisateur</legend>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Login</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
						foreach($res as $row)
						{
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['login']);?></td>
                        <td><a href="#" id="<?php echo $row['uid']; ?>" data-toggle="modal" data-target="#ModMdp"
                                onclick="document.getElementById('ref_id_bouton').value=this.id;"><span
                                    class="btn btn-sm btn-warning">Modifier</span></a></td>
                    </tr>
                    <?php
						}
?>
                </tbody>
            </table>
        </div>
    </fieldset>
</div>
<div class="modal fade" id="ModMdp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                Modifiez le mot de passe
            </div>
            <div class="modal-footer" align="center">
                <form method="post" action="traitement_mod_uti.php">
                    <table>
                        <input type='hidden' name="uid" value='' id='ref_id_bouton'>
                        <tr>
                            <td><label for="inputMdp" class="control-label">Mot de passe</label></td>
                            <td><input type="password" name="psw" class="form-control" id="inputPsw"
                                    placeholder="mot de passe" required maxlength="255"></td>
                            <td><input type="checkBox" name="afficheMDP" id="afficheMDP"
                                    onchange="changeType(this)">Afficher le mot de passe</td>
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