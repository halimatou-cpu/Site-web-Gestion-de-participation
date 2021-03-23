<title>Liste à cocher pour l'événement ouvert</title>
<?php
	include("session.php");
	if (!isset($_GET["eid"])){
		echo "Erreur dans l'eid, vous allez être redirigé.";
		echo "<meta http-equiv='refresh' content='2;event_ouvert.php' />";

	}else{
		$SQL = "SELECT ins.pid, p.nom, p.prenom FROM personnes p, inscriptions ins WHERE p.pid=ins.pid AND ins.eid = ? ORDER BY p.pid ";
		$st = $db->prepare($SQL);
		$st->execute([$_GET["eid"]]);
		if ($st->rowCount()==0)
		{
		echo "<P>La liste est vide";
		echo "<meta http-equiv='refresh' content='2;event_ouvert.php' />";
		}
		else
		{	
?>				
			<div class="verticalement">
				<fieldset>
					<legend align="center">Liste à cocher pour l'événement ouvert</legend>
					<div class="table-responsive">
						<table class="table table-hover">
					  		<thead>
							    <tr>
							      <th scope="col">Nom</th>
							      <th scope="col">Prénom</th>
							    </tr>
							</thead>
							<tbody>
								<form action="traitement_coche_ouvert.php" method="post">
<?php
									foreach($st as $row)
									{
?>
										<tr class="active">
											<td><?php echo htmlspecialchars($row['nom']); ?></td>
											<td><?php echo htmlspecialchars ($row['prenom']); ?></td>
											<td>
												<div class="form-check">
													<input type="hidden" name="eid" value="<?php echo htmlspecialchars($_GET['eid']);?>">
			    									<input type="checkbox" class="custom-control-input" name="pid[]" value="<?php echo htmlspecialchars($row['pid']);?>">
			    								</div>
			    							</td>
										</tr>
<?php
									}
?>
									<tr>
										<td><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Valider la participation</button></td>
										<td><a href="#" data-toggle="modal" data-target="#AjoutPer" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Inscrire une nouvelle personne</a></td>
									</tr>
								</form>
							</tbody>
						</table>
					</div>
				</fieldset>
			</div>
			<div class="modal fade" id="AjoutPer" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" align="center">
						Ajoutez une personne
						</div>
						<div class="modal-footer" align="center">
							<form method="post" action="traitement_ajout_per_uti.php">
								<table>
									<input type="hidden" name="eid" value="<?php echo $_GET['eid'];?>">
									<tr>
				                        <td><label for="inputNom" class="control-label">Nom</label></td>
				                        <td><input type="text" name="nom" class="form-control" id="nom" placeholder="nom" required value="" maxlength="25"></td>
				                    </tr>
				                    <tr>
			                        	<td><label for="inputPrenom" class="control-label">Prénom</label></td>
			                            <td><input type="text" name="prenom" class="form-control" id="prenom" placeholder="prénom" required value="" maxlength="24"></td>
			                    	</tr>
			                    	<tr>
			                    		<div class="custom-control custom-checkbox">
										    <input type="checkbox" class="custom-control-input" id="defaultUnchecked" onclick="CheckDisabled('defaultUnchecked');">
										    <label class="custom-control-label" for="defaultUnchecked">Remplir les moyens d'identification plus tard (nom et prénom par défaut)</label>
										</div>
									</tr>
									<tr>
				                        <td><label for="inputType" class="control-label">Type</label></td>
			                            <td>
			                            	<select class="form-control" name="choixId" id="choixId" required>
<?php
												$SQL="SELECT tid, nom from itypes ORDER BY tid DESC";
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
							    <button type="submit" class="btn btn-secondary">Ajouter</button>
							</form>
						</div>
					</div>
				</div>
			</div>

<?php
		}
	}
?>
