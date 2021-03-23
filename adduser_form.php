<title>Ajout d'un utilisateur</title>
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

              <h1 class = "header1">Ajout d'un Utilisateur</h1></br>

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
                            </tr>
<?php
                        }
?>
                        <tr>
                            <td><a href="#" data-toggle="modal" data-target="#AjoutUser" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            </div>

        <div class="modal fade" id="AjoutUser" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" align="center">
                    Ajoutez un utilisateur
                    </div>
                    <div class="modal-footer" align="center">
                        <form method="post" action="adduser.php">
        <table>
                    <tr>
                        <td><label for="inputLogin" class="control-label">Login</label></td>
                            <td><input type="text" name="login" class="form-control" id="inputLogin" placeholder="login" required value="<?= $data['login']??""?>" maxlength="30"></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP" class="control-label">Mot de passe</label></td>
                            <td><input type="password" name="mdp" class="form-control" id="inputMDP" placeholder="Mot de passe" required value="" maxlength="255"></td>
                    </tr>
                    <tr>
                        <td><label for="inputMDP2" class="control-label">Répéter Mot de passe</label></td>
                            <td><input type="password" name="mdp2" class="form-control" id="inputMDP" placeholder="Répéter le mot de passe" required value="" maxlength="255"></td>
                    </tr>
        </table>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
    </form>
                    </div>
                </div>
            </div>
        </div>

<?php
    }

?>
