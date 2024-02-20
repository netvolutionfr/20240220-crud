<?php
require 'database.php';

$sql = 'SELECT * FROM user';
$statement = $db->query($sql);
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>CRUD Users</title>
    <link rel="stylesheet" href="css/pico.css">
    <link rel="stylesheet" href="css/pico.colors.css">
</head>
<body>
<div class="container">
    <h1>Gestion des utilisateurs</h1>
    <a href="create.php" role="button">Ajouter un utilisateur</a>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
        ?>
        <!-- debut user -->
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td>
                <a href="read.php?id=<?php echo $user['id']; ?>" role="button">Voir</a>
                <a href="update.php?id=<?php echo $user['id']; ?>" role="button">Modifier</a>
                <a href="delete.php?id=<?php echo $user['id']; ?>" role="button" class="pico-background-red-500">Supprimer</a>
            </td>
        </tr>
        <!-- fin user -->
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>