<?php
require('modele/Tag.php');

$tag = new Tag();
/*$tag->name = 'le nom du tag';
$tag->description = '';
$tag->insert();
*/

//resetDb(); // Enlever le commentaire pour reset la liste

// if ($op === 'delete') { // condition du delete
//     if ($id > 0) {
//         $tag->delete($id);
//         $tags = $tag->tous();
//         require_once('vue/tag_supprimer.php');
//         require_once('vue/tag_liste.php');
//     }
// } elseif ($op === 'update') {
//     require_once('vue/tag_update.php');
// } elseif ($op === 'insert') {
//     require_once('vue/tag_liste.php');
//     echo $_POST["nom"]; //pour récupérer les données
//     if (!filter_var($name, FILTER_VALIDATE_BOOLEAN) === false) { //pour filtrer valider les données
//         echo ("$name is a valid name");
//     } else {
//         echo ("$name is not a valid name");
//     }
//     UPDATE tag //mettre à jour la base de données
//     SET name, Description=valeur2 
//     WHERE some_colonne=some_value;

// } else {
//     $tags = $tag->tous(); // on récupère toute la liste des tags
//     require_once('vue/tag_liste.php'); // on affiche la liste des tags
// } // OU JE PEUX FAIRE UN SWITCH


switch ($op) {
    case 'delete':
        if ($id > 0) {
            $tag->delete($id);
            $tags = $tag->tous();
            require_once('vue/tag_supprimer.php');
            require_once('vue/tag_liste.php');
        }
        break;
    case 'update':
        require_once('vue/tag_update.php');
        break;
    case 'liste':
        $tags = $tag->tous();
        require_once('vue/tag_liste.php');
        break;
    case 'submit':
        // require_once('vue/tag_liste.php');
        //1 recupérer les données du formulaire
        echo $_POST["nom"];
        echo $_POST["description"];
        //2 filtrer valider ses données (FILTER_VALIDATE)
        $name = trim(filter_var($_POST["nom"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if (mb_strlen($name) > 0) {
            echo ("$name is a valid name");
        } else {
            echo ("$name is not a valid name");
        }
        $description = trim(filter_var($_POST["description"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        if (mb_strlen($description) > 0) {
            echo ("$description is a valid description");
        } else {
            echo ("$description is not a valid description");
        }
        //3 mettre à jour la BDD UPDATE
        $tag = new Tag();
        $tag->select($id);
        $tag->name = $name;
        $tag->description = $description;
        $tag->update();
        //4 générer la réponse
        //4a sélectionner les données pour la réponse
        //4b sélectionner la vue pr la rép.
        $tags = $tag->tous(); // on récupère toute la liste des tags
        require_once('vue/tag_liste.php');
        break;
    default:
        $tags = $tag->tous(); // on récupère toute la liste des tags
        require_once('vue/tag_liste.php'); // on affiche la liste des tags

}
