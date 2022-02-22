<?php
require('modele/Tag.php');

$tag = new Tag();
/*$tag->name = 'le nom du tag';
$tag->description = '';
$tag->insert();
*/

//resetDb(); // Enlever le commentaire pour reset la liste

if ($op === 'delete') { // condition du delete
    if ($id > 0) {
        $tag->delete($id);
        $tags = $tag->tous();
        require_once('vue/tag_supprimer.php');
        require_once('vue/tag_liste.php');
    }
} elseif ($op === 'update') {
    require_once('vue/tag_update.php');
} else {
    $tags = $tag->tous(); // on récupère toute la liste des tags
    require_once('vue/tag_liste.php'); // on affiche la liste des tags
}


/*switch ($op) {
    case 'delete';
        require_once('vue/tag_supprimer.php');
        require_once('vue/tag_liste.php');
        break;
    case 'update';
        require_once('vue/tag_update.php');
        break;
    case 'liste';
        require_once('vue/tag_liste.php');
        break;
}*/
