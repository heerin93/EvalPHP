<!-- VUE DE LA PAGE D'ACCUEIL -->
<?php
include "../model/manager_players.php"; // Inclusion du fichier qui gère les joueurs
$manager = new ManagerPlayer();
$players = $manager->getPlayers(); // Récupération de tous les joueurs depuis la BDD
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperGame - Joueurs</title>
</head>
<body>

<h2>Ajouter un Joueur</h2>
<form method="POST" action="index.php">
    <label>Pseudo:</label>
    <input type="text" name="pseudo" required>
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Mot de passe:</label>
    <input type="password" name="password" required>
    <button type="submit" name="submit">S'inscrire</button>
</form>

<h2>Liste des Joueurs</h2>
<ul>
    <?php foreach ($players as $player) : ?>
        <li><?= htmlspecialchars($player["pseudo"]) ?> - Score: <?= $player["score"] ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>