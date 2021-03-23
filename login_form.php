<?php
$page_title="Authentification";
include("header.php");
echo "<p class=\"error\">".($error??"")."</p>";
?>

    <div class="center-block"style="position: relative; margin-left: 40% ; margin-top: 10%">
        <h2>Authentifiez-vous</h2>

        <form method="post" action="login.php">
            <!--legend>Authentifiez-vous</legend-->
            <table class="center">
                <tr>
                <td><label for="inputNom" class="control-label">Login</label></td>
                <td><input type="text" name="login" size="20" class="form-control" id="inputLogin" required placeholder="login"
                       required value="<?= $data['login']??"" ?>"></td>
                </tr>
                <tr>
                <td><label for="inputMDP" class="control-label">Mot de passe</label></td>
                <td><input type="password" name="password" size="20" class="form-control" required id="inputMDP"
                       placeholder="Mot de passe"></td>
                </tr>
            </table>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Connexion</button>
            </div>
        </form>
    </div>
<?php
include("footer.php");
?>