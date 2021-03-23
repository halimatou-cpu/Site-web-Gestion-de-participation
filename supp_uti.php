<title>Suppression d'un utilisateur</title>
<?php

		include("session.php");
			$SQL = "SELECT * FROM users WHERE role = 'user' ORDER BY uid";
			$res = $db->query($SQL);
			if ($res->rowCount()==0)
			{
			echo "<P>La liste est vide";
			}
			else
			{	
?>				
				<div class="container">
 
        <h1 class = "header1">Suppression d'un utilisateur</h1></br>
    
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
                        <td><?php echo htmlspecialchars($row['login']); ?></td>
										<td><a href="#" class="btn btn-sm btn-danger" id="<?php echo $row['uid']; ?>" data-toggle="modal" data-target="#confirmationSupp" onclick="document.getElementById('ref_id_bouton').value=this.id;"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
                    </tr>
                    <?php
						}
?>
                </tbody>
            </table>
</div>

				<div class="modal fade" id="confirmationSupp" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" align="center">
							Êtes-vous sûr de supprimer cet utilisateur ?
							</div>
							<div class="modal-footer" style="display: flex; flex-direction: row;">
								<form method="post" action="traitement_supp_uti.php">
									<input type='hidden' name="uid" value='' id='ref_id_bouton'>
								    <button type="submit" class="btn btn-secondary" style="height: 35px;">Oui</button> </a>
								</form>
								<button type="button" data-dismiss="modal" class="btn btn-primary" style="height: 35px;">Annuler</button>
							</div>
						</div>
					</div>
				</div>
<?php
			}
?>




