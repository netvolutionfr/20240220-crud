<?php
global $db;
require 'database.php';

$sql = "SELECT user.id, user.name, email, role.name as role FROM user INNER JOIN role ON user.role_id = role.id WHERE user.id=:id";
$statement = $db->prepare($sql);

$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Détail utilisateur</title>
    <link rel="stylesheet" href="css/pico.css">
</head>
<body>
<div class="container">
    <h1>Détail utilisateur</h1>
    <a href="index.php">Retour à la liste</a>
    <br>
    <?php
    if ($user) {
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td><?php echo $user['id']; ?></td>
        </tr>
        <tr>
            <td>Nom</td>
            <td><?php echo $user['name']; ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <td>Rôle</td>
            <td><?php echo $user['role']; ?></td>
        </tr>
    </table>
    <?php
    } else {
        echo 'Aucun utilisateur trouvé';
    }
    ?>
</div>
</body>
</html>
