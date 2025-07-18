<?php

// On essaye de se connecter à la base de données
try {
    // On crée une connexion avec PDO en utilisant les constantes 
    $mysqlClient = new PDO(
        sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
        MYSQL_USER,
        MYSQL_PASSWORD
    );

    // Cette ligne permet d'afficher les erreurs si jamais y’a un problème dans la base
    $mysqlClient->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Si jamais la connexion échoue, on affiche l’erreur et on stoppe tout
} catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage()); // Affiche le message d’erreur
}
