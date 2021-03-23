<title>Ajout d'un type d'identification</title>
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
                    <h1 class = "header1">Ajout d'un type d'identification</h1></br>
                    <div class="table-reponsible">
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
								<td><?php echo htmlspecialchars($row['tid']);?></td>
								<td><?php echo htmlspecialchars($row['nom']);?></td>
							</tr>
<?php
						}
?>
						<tr>
							<td><a href="#" data-toggle="modal" data-target="#AjoutId" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></td>
						</tr>	
					</tbody>
				</table>
			</div>
			</div>
		<div class="modal fade" id="AjoutId" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form method="post" action="traitement_ajout_id.php">
       						<table>
			                    <tr>
			                        <td><label for="inputLogin" class="control-label">Nouveau moyen d'identification</label></td>
			                            <td><input type="text" name="AjoutId" class="form-control" required value="" maxlength="40"></td>
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
