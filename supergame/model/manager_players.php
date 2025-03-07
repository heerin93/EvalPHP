<?php
include "../utils/utils.php";
include "./model_joueurs.php";

class ManagerPlayer {
    private PDO $bdd;

    public function __construct() {
        $this->bdd = connect();
    }

    // Ajouter un joueur
    public function addPlayer(ModelPlayer $player): string {
        // Vérifier si l'email existe déjà
        if ($this->getPlayerByMail($player->getEmail())) {
            return "L'email est déjà utilisé.";
        }

        // Hash du mot de passe
        $hashedPassword = password_hash($player->getPassword(), PASSWORD_BCRYPT);

        $sql = "INSERT INTO players (pseudo, email, score, psswrd) VALUES (:pseudo, :email, :score, :password)";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([
            "pseudo" => $player->getPseudo(),
            "email" => $player->getEmail(),
            "score" => $player->getScore(),
            "password" => $hashedPassword
        ]);

        return "Joueur ajouté avec succès !";
    }

    // Récupérer tous les joueurs
    public function getPlayers(): array {
        $sql = "SELECT pseudo, score FROM players";
        $stmt = $this->bdd->query($sql);
        return $stmt->fetchAll();
    }

    // Récupérer un joueur par email
    public function getPlayerByMail(string $email): ?array {
        $sql = "SELECT * FROM players WHERE email = :email";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute(["email" => $email]);
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
?>