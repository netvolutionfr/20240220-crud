<?php
global $db;
require 'database.php';

$sql = "SELECT * FROM role";
$statement = $db->query($sql);
$roles = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Créer un utilisateur</title>
    <link rel="stylesheet" href="css/pico.css">
</head>
<body>
<div class="container">
    <h1>Créer un utilisateur</h1>
    <form action="create_submit.php" method="post">
        <label for="name">Nom et prénom</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="role">Rôle</label>
        <select id="role" name="role" required>
            <option value="" selected>Sélectionner un rôle</option>
            <?php
            foreach($roles as $role) {
            ?>
            <option value="<?php echo $role["id"]; ?>"><?php echo $role["name"]; ?></option>
            <?php
            }
            ?>
        </select>

        <button type="submit">Créer</button>
    </form>
</div>
</body>
</html>