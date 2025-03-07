<?php
//Fonction de nettoyage de données
function sanitize($data){
    return htmlentities(strip_tags(stripslashes(trim($data))));
}

//Fonction de création de l'objet de connexion PDO
//TODO : configurer correctement les paramètres du constructeur
function connect() {
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=supergame;charset=utf8mb4", "root", "", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $bdd;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
?>