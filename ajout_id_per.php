<title>Ajout d'identifiants à une personne</title>
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

        <h1 class = "header1">Ajout d'identifiants à une personner</h1></br>
                    <div class="table-responsive">
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
									<td><?php echo htmlspecialchars($row['nom']); ?></td>
									<td><?php echo htmlspecialchars ($row['prenom']); ?></td>
									<td><a href="#" data-toggle="modal" data-target="#AjoutIdPer" class="btn btn-success" id="<?php echo $row['pid']; ?>" onclick="document.getElementById('ref_id_bouton').value=this.id;"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></td>
								</tr>
<?php
							}
?>
						</tbody>
					</table>
				</div>
				
			</div>
			<div class="modal fade" id="AjoutIdPer" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" align="center">
						Ajoutez un moyen d'identification
						</div>
                    <div class="modal-footer" align="center">
                        <form method="post" action="traitement_ajout_id_per.php">
					        <table>
					        	<input type='hidden' name="pid" value='' id='ref_id_bouton'>
			                    <tr>
			                        <td><label for="inputType" class="control-label">Type</label></td>
		                            <td>
		                            	<select class=form-control name="choixId" id="choixId" required>
<?php
											$SQL="SELECT tid, nom from itypes ORDER BY tid";
											$res = $db->query($SQL);
											while($recu=$res->fetch())
											{
												echo "<option value=".$recu['tid'].">".htmlspecialchars($recu['nom'])."</option>";
											}
?>
										</select>
									</td>
                    			</tr>
                    <tr>
                        <td><label for="inputValeur" class="control-label">Valeur</label></td>
                            <td><input type="text" name="valeur" class="form-control" id="valeur" placeholder="valeur" required value="" maxlength="50"></td>
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
