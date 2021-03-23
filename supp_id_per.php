<title>Suppression des identifiants d'une personne</title>
<?php
	include("session.php");
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $login, $mdp);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$SQL = "SELECT P.pid, P.nom, P.prenom, ID.valeur, ID.tid, IT.nom AS itnom FROM personnes P, identifications ID, itypes IT WHERE P.pid = ID.pid AND ID.tid = IT.tid";
			$res = $db->query($SQL);
		if ($res->rowCount()==0)
		{
		echo "<P>La liste est vide";
		}
		else
		{	
?>				
	<div class="container">

	<h1 class = "header1">Suppression des identifiants d'une personne</h1></br>
                    <div class="table-responsive">
						<table class="table table-hover">
					  		<thead>
							    <tr>
							      <th scope="col">Nom</th>
							      <th scope="col">Prénom</th>
							      <th scope="col">Valeur</th>
							      <th scope="col">Types</th>
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
										<td><?php echo htmlspecialchars ($row['valeur']); ?></td>
										<td><?php echo htmlspecialchars ($row['itnom']); ?></td>
										<td><a href="#" class="btn btn-sm btn-danger" id="<?php echo $row['uid']; ?>" data-toggle="modal" data-target="#confirmationSupp" onclick="GetPidTid('<?php echo $row['pid']; ?>','<?php echo $row['tid']; ?>');"><span class="glyphicon glyphicon-trash"></span> Supprimer</a></td>
									</tr>
<?php
								}
?>
							</tbody>
						</table>
					</div>
					</fieldset>
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
							Êtes-vous sûr de supprimer ce moyen d'identification ?
							</div>
							<div class="modal-footer" align="center" style="display: flex; flex-direction: row;">
								<form method="post" action="traitement_supp_id_per.php">
									<table>
									<input type='hidden' name="pid" value='' id='pid'>
									<input type='hidden' name="tid" value='' id='tid'>
									
									</table>
								    <button type="submit" class="btn btn-secondary" style="height: 35px;">Oui</button>
								</form>
								<button type="button" data-dismiss="modal" class="btn btn-primary" style="height: 35px;">Annuler</button>
							</div>
						</div>
					</div>
				</div>
<?php
		}
?>