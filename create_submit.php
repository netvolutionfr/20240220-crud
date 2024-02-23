<?php
global $db;
require 'database.php';

// Récupération des variables "name", "email" et "role"
$name = $_POST['name'];
$email = $_POST['email'];
$role = $_POST['role'];

$sql = "INSERT INTO user (name, email, role_id) VALUES (:name, :email, :role)";
$statement = $db->prepare($sql);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':role', $role, PDO::PARAM_INT);

if ($statement->execute()) {
    $message = 'Utilisateur créé';
} else {
    $message = 'Erreur lors de la création';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Résultat de la création d'un utilisateur</title>
    <link rel="stylesheet" href="css/pico.css">
</head>
<body>
<div class="container">
    <h1>Résultat de la création d'un utilisateur</h1>
    <a href="index.php">Retour à la liste</a>
    <br>
    <p><?php echo $message; ?></p>
</div>
</body>
</html>
