<?php


function displayAuthor(string $authorEmail, array $users): string
{
    // On parcourt tous les utilisateurs
    foreach ($users as $user) {
        // Si l'email correspond à celui de l’auteur de la recette
        if ($authorEmail === $user['email']) {
           
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    // Si on ne trouve pas l’auteur, on retourne "Auteur inconnu"
    return 'Auteur inconnu';
}


function isValidRecipe(array $recipe): bool
{
    // Si la clé 'is_enabled' existe dans la recette, on la récupère
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        // Sinon, on considère que la recette n'est pas activée
        $isEnabled = false;
    }

    
    return $isEnabled;
}


function getRecipes(array $recipes): array
{
    $valid_recipes = [];

  
    foreach ($recipes as $recipe) {
        // Si la recette est valide, on l’ajoute dans la liste finale
        if (isValidRecipe($recipe)) {
            $valid_recipes[] = $recipe;
        }
    }

    // On retourne le tableau avec seulement les bonnes recettes
    return $valid_recipes;
}

// Cette fonction redirige vers une autre page (URL)
function redirectToUrl(string $url): never
{
    // On envoie un en-tête HTTP pour rediriger le navigateur
    header("Location: {$url}");
    exit(); // On arrête le script ici ,sinon le reste du code se lance quand même
}
