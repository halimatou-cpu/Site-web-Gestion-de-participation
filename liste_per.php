<title>Liste des personnes</title>
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
 
        <h1 class = "header1">Liste des personnes</h1></br>
    
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
                    </tr>
                    <?php
                        }
?>
                </tbody>
            </table>
</div>


<?php
	}
?>


