<?php
session_start(); // Démarre la session pour gérer la connexion de l'utilisateur

// Inclusion des fichiers essentiels
require_once(__DIR__ . '/config/mysql.php'); 
require_once(__DIR__ . '/databaseconnect.php'); 
require_once(__DIR__ . '/variables.php'); 
require_once(__DIR__ . '/functions.php'); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <!-- Import du CSS de Bootstrap pour avoir un design propre rapidement -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?> <!-- Affiche l'en-tête du site -->

        <h1>Site de recettes</h1>

        <?php require_once(__DIR__ . '/login.php'); ?> <!-- Affiche le formulaire de connexion si besoin -->

        <?php foreach (getRecipes($recipes) as $recipe) : ?> <!-- Boucle sur chaque recette valide -->
            <article>
                <h3><?php echo($recipe['title']); ?></h3> <!-- Titre de la recette -->
                <div><?php echo $recipe['recipe']; ?></div> <!-- Contenu de la recette -->
                <i><?php echo displayAuthor($recipe['author'], $users); ?></i> <!-- Affiche l'auteur avec son âge -->

                <?php if (
                    isset($_SESSION['LOGGED_USER']) &&
                    $recipe['author'] === $_SESSION['LOGGED_USER']['email']
                ) : ?>
                    <!-- Si l'utilisateur est connecté et que c'est lui qui a posté la recette, il peut modifier ou supprimer -->
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">
                            <a class="link-warning" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a>
                        </li>
                        <li class="list-group-item">
                            <a class="link-danger" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach ?>
    </div>

    <?php require_once(__DIR__ . '/footer.php'); ?> <!-- Affiche le pied de page -->
</body>
</html>
