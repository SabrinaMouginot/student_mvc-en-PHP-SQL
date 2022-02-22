<?php
require('modele/Project.php');

$project = new Project();
/*$project->name = 'le nom du project';
$project->description = '';
$project->insert();
*/
//resetDb(); // Enlever le commentaire pour reset la liste

if ($op === 'delete') { // condition du delete
    if ($id > 0) {
        $project->delete($id);
        $project = $project->tous();
        require_once('vue/project_supprimer.php');
        require_once('vue/project_liste.php');
        require_once('vue/project_update.php');
    }
} else {
    $projects = $project->tous(); // on récupère toute la liste des tags
    require_once('vue/project_liste.php'); // on affiche la liste des tags
}
