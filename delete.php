<?php
require 'database.php';

$sql = "DELETE FROM user WHERE id=:id";
$statement = $db->prepare($sql);

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
if ($statement->execute()) {
    $message = 'Utilisateur supprimé';
} else {
    $message = 'Erreur lors de la suppression';
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Suppression utilisateur</title>
    <link rel="stylesheet" href="css/pico.css">
</head>
<body>
<div class="container">
    <h1>Détail utilisateur</h1>
    <a href="index.php">Retour à la liste</a>
    <br>
    <p><?php echo $message; ?></p>
</div>
</body>
</html>
