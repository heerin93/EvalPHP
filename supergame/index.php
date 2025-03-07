<?php
//CONTROLER DE LA PAGE D'ACCUEIL

include "./model/manager_players.php";

$manager = new ManagerPlayer();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
    $pseudo = trim($_POST["pseudo"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Vérifications de sécurité
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Email invalide.";
    } elseif (strlen($password) < 6) {
        $message = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        $player = new ModelPlayer($pseudo, $email, $password);
        $message = $manager->addPlayer($player);
    }
}

// Redirection vers la page principale après l'inscription
header("Location: view_accueil.php");
exit;
?>