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
    <link rel="stylesheet" href="css/icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Gestion des utilisateurs</h1>
    <a href="create.php" class="icon-wrapper" data-tooltip="Ajouter un utilisateur"><i class="gg-add"></i></a>
    <br>
    <table class="striped">
        <thead data-theme="dark">
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
                <div class="grid">
                    <a href="read.php?id=<?php echo $user['id']; ?>" class="icon-wrapper" data-tooltip="Détail"><i class="gg-search"></i></a>
                    <a href="update.php?id=<?php echo $user['id']; ?>" class="icon-wrapper" data-tooltip="Modifier"><i class="gg-pen"></i></a>
                    <a href="delete.php?id=<?php echo $user['id']; ?>" class="icon-wrapper" data-tooltip="Supprimer"  data-target="modal-delete" onclick="toggleModal(event)"><i class="gg-trash"></i></a>
                </div>
            </td>
        </tr>
        <!-- fin user -->
        <?php
        }
        ?>
        </tbody>
    </table>
</div>
<dialog id="modal-delete">
    <article>
        <header>
            <button
                    aria-label="Close"
                    rel="prev"
                    data-target="modal-delete"
                    onclick="toggleModal(event)"
            ></button>
            <h3>Confirmez-vous la suppression ?</h3>
        </header>
        <p>
            La suppression est irréversible. Souhaitez-vous réellement supprimer cet élément ?
        </p>
        <footer>
            <button
                    role="button"
                    class="secondary"
                    data-target="modal-delete"
                    onclick="toggleModal(event)"
            >
                Annuler</button
            ><button autofocus data-target="modal-delete" onclick="toggleModal(event)">
                Supprimer
            </button>
        </footer>
    </article>
</dialog>
<script src="js/modal.js"></script>
</body>
</html>