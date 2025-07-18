<?php

// Vérifie si la variable de session 'LOGGED_USER' n'existe pas (donc si l'utilisateur n'est pas connecté)
if (!isset($_SESSION['LOGGED_USER'])) {
    echo('Vous devez être connecté pour accéder à cette fonctionnalité.');
    
    // Stoppe le script ici pour éviter d'exécuter la suite du code (protection de la page)
    exit;
}
