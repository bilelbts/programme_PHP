<?php
// On démarre la session pour accéder aux infos de l'utilisateur connecté
session_start();

// On vérifie que l'utilisateur est bien connecté avant d'afficher la page
require_once(__DIR__ . '/isConnect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Adaptation à tous les écrans (téléphone, tablette, etc.) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Site de Recettes - Ajout de recette</title>
    
  
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100"> <!-- Mise en page qui prend toute la hauteur de l'écran -->
    <div class="container">
        
        <?php require_once(__DIR__ . '/header.php'); ?>

        <h1>Ajouter une recette</h1>

        <!-- Formulaire pour envoyer une nouvelle recette -->
        <form action="recipes_post_create.php" method="POST">
            <!-- Champ pour le titre de la recette -->
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help">
                <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
            </div>

            <!-- Champ pour écrire la recette -->
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe"></textarea>
            </div>

            <!-- Bouton pour envoyer le formulaire -->
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <!-- Pied de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
