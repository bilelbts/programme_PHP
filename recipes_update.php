<?php
// On démarre la session pour avoir accès aux infos de l'utilisateur connecté
session_start();

// On vérifie que l'utilisateur est connecté
require_once(__DIR__ . '/isConnect.php');

// On importe les fichiers nécessaires pour se connecter à la base de données
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');


$getData = $_GET;


if (!isset($getData['id']) || !is_numeric($getData['id'])) {
    echo('Il faut un identifiant de recette pour la modifier.');
    return;
}

// requête pour récuperer les infos de la recette dans la base de données
$retrieveRecipeStatement = $mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id = :id');
$retrieveRecipeStatement->execute([
    'id' => (int)$getData['id'], // On force l'id à être un nombre entier
]);

// On récupère la recette sous forme de tableau associatif (clé => valeur)
$recipe = $retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Edition de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

       
        <?php require_once(__DIR__ . '/header.php'); ?>

        <h1>Mettre à jour <?php echo($recipe['title']); ?></h1>

        <!-- Formulaire pour modifier une recette -->
        <form action="recipes_post_update.php" method="POST">
            <!-- Champ caché pour garder l'id de la recette à modifier -->
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de la recette</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>">
            </div>

            <!-- Champ pour modifier le titre -->
            <div class="mb-3">
                <label for="title" class="form-label">Titre de la recette</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" value="<?php echo($recipe['title']); ?>">
                <div id="title-help" class="form-text">Choisissez un titre percutant !</div>
            </div>

            <!-- Zone de texte pour modifier la recette -->
            <div class="mb-3">
                <label for="recipe" class="form-label">Description de la recette</label>
                <textarea class="form-control" placeholder="Seulement du contenu vous appartenant ou libre de droits." id="recipe" name="recipe"><?php echo $recipe['recipe']; ?></textarea>
            </div>

            
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

        <br />
    </div>

  
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
