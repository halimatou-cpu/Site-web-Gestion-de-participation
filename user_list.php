<title>Liste des utilisateurs</title>
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
 
        <h1 class = "header1">Liste des utilisateurs</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Login</th>
                         <th scope="col">Role</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
						foreach($res as $row)
						{
?>
                    <tr class="active">
                        <td><?php echo htmlspecialchars($row['login']); ?></td>
                        <td><?php echo htmlspecialchars($row['role']); ?></td>
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


