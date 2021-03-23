<title>Modification des identifiants d'une personne</title>
<?php
	include("session.php");
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
 
        <h1 class = "header1">Modification des identifiants d'une personne</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                       <th scope="col">Nom</th>
					      <th scope="col">Prénom</th>
					      <th scope="col">Valeur</th>
					      <th scope="col">Type</th>
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
								<td><a href="#" id="<?php echo $row['pid'].' '.$row['tid']; ?>" data-toggle="modal" data-target="#ModIdPer" 
									onclick="GetPidTidValeur('<?php echo htmlspecialchars(addslashes($row['pid'])); ?>','<?php echo htmlspecialchars(addslashes($row['tid'])); ?>','<?php echo htmlspecialchars(addslashes($row['valeur'])); ?>');"><span class="btn btn-sm btn-warning">Modifier</span></a></td>
                    </tr>
                    <?php
                        }
?>
                </tbody>
            </table>
</div>
		<div class="modal fade" id="ModIdPer" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body" align="center">
               			 Modifiez les identifications
                    </div>
                    <div class="modal-footer" align="center">
                        <form method="post" action="traitement_mod_id_per.php">
        					<table>
        						<input type='hidden' name="pid" value='' id='pid'>
								<input type='hidden' name="tid" value='' id='tid'>
			                    <tr>
			                    	<td><label for="inputValeur" class="control-label">Valeur</label></td>
			                        <td><input type="text" name="valeur" class="form-control" id="valeur" placeholder="valeur" required maxlength="50"></td>
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


