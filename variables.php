<?php


$usersStatement = $mysqlClient->prepare('SELECT * FROM users');// On prépare une requête pour récupérer tous les utilisateurs depuis la base de données
$usersStatement->execute();// On exécute la requête
$users = $usersStatement->fetchAll();// On récupère tous les résultats sous forme de tableau


$recipesStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE is_enabled is TRUE');// On prépare une autre requête pour récupérer seulement les recettes qui sont activées (is_enabled = TRUE)
$recipesStatement->execute();// On exécute cette requête 
$recipes = $recipesStatement->fetchAll();// On récupère toutes les recettes validessous forme de tableau
