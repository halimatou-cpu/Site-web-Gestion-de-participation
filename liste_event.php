<title>Liste des événements pour les inscrits</title>
<?php
	include("session.php");	
	$SQL = "SELECT * FROM evenements ORDER BY eid";
	$res = $db->query($SQL);
	if ($res->rowCount()==0)
	{
	echo "<P>La liste est vide";
	}
	else
	{	
?>
<div class="container">
 
        <h1 class = "header1">Liste des événements pour les inscrits</h1></br>
    
            <table class="table table-hover">
                <thead>
                    <tr>
                          <th scope="col">Intitulé</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                        foreach($res as $row)
                        {
?>
                    <tr class="active">
                        <td>
                            <?php 
                                echo "<a href='liste_inscrits.php?eid=".htmlspecialchars($row['eid'])."'>";
                                echo htmlspecialchars($row['intitule']);
?>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($row['description']);?></td>
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



