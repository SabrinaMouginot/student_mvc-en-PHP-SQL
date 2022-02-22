<?php
require('modele/Project.php');

$project = new Project();
/*$project->name = 'le nom du project';
$project->description = '';
$project->insert();
*/
//resetDb(); // Enlever le commentaire pour reset la liste

// if ($op === 'delete') { // condition du delete
//     if ($id > 0) {
//         $project->delete($id);
//         $projects = $project->tous();
//         require_once('vue/project_supprimer.php');
//         require_once('vue/project_liste.php');
//         require_once('vue/project_update.php');
//     }
// } else {
//     $projects = $project->tous(); // on récupère toute la liste des tags
//     require_once('vue/project_liste.php'); // on affiche la liste des tags
// }

switch ($op) {
    case 'delete':
        if ($id > 0) {
            $project->delete($id);
            $projects = $project->tous();
            require_once('vue/project_supprimer.php');
            require_once('vue/project_liste.php');
        }
        break;
    case 'update':
        require_once('vue/project_update.php');
        break;
    case 'liste':
        $tprojecs = $project->tous();
        require_once('vue/project_liste.php');
        break;
    case 'submit':
        // require_once('vue/project_liste.php');
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
        $project = new Project();
        $project->select($id);
        $project->name = $name;
        $project->description = $description;
        $project->update();
        //4 générer la réponse
        //4a sélectionner les données pour la réponse
        //4b sélectionner la vue pr la rép.
        $projects = $project->tous(); // on récupère toute la liste des projects
        require_once('vue/project_liste.php');
        break;
    default:
        $projects = $project->tous(); // on récupère toute la liste des projects
        require_once('vue/project_liste.php'); // on affiche la liste des projects
}
