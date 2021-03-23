<?php

    require("auth/EtreAuthentifie.php");
    if($idm->getRole()=="admin")
    {
        $page_title = "Ajout d'un utilisateur";
        
$error = "";

foreach (['login', 'mdp', 'mdp2'] as $name) {
    if (empty($_POST[$name])) {
        $error .= "La valeur du champs '$name' ne doit pas être vide";
    } else {
        $data[$name] = $_POST[$name];
    }
}


// Vérification si l'utilisateur existe
$SQL = "SELECT login FROM users WHERE login=?";
$stmt = $db->prepare($SQL);
$res = $stmt->execute([$data['login']]);

if ($res && $stmt->fetch()) {
    $error .= "Login déjà utilisé";
}

if ($data['mdp'] != $data['mdp2']) {
    $error .="MDP ne correspondent pas";
}

if (!empty($error)) {
    echo $error;
    echo "<meta http-equiv='refresh' content='2;adduser_form.php'/>";
    exit();
}


foreach (['login', 'mdp'] as $name) {
    $clearData[$name] = $data[$name];
}

$passwordFunction =
    function ($s) {
        return password_hash($s, PASSWORD_DEFAULT);
    };

$clearData['mdp'] = $passwordFunction($data['mdp']);

try {
    $SQL = "INSERT INTO users(uid,login,mdp) VALUES (DEFAULT,:login,:mdp)";
    $stmt = $db->prepare($SQL);
    $res = $stmt->execute($clearData);
    $id = $db->lastInsertId();
   echo "Utilisateur $clearData[login] : " . $id . " ajouté avec succès.";
} catch (\PDOException $e) {
    http_response_code(500);
    echo "Erreur de serveur.";
    echo "<meta http-equiv='refresh' content='2;adduser_form.php'/>";
    exit();

}
echo "<meta http-equiv='refresh' content='2;adduser_form.php'/>";
}

?>




