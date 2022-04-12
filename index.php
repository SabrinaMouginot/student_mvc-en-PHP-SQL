<?php

// Un modèle (Model) contient les données à afficher.
// Une vue (View) contient la présentation de l'interface graphique.
// Un contrôleur (Controller) contient la logique concernant les actions effectuées par l'utilisateur.

//  CRUD (create, read, update, delete) (créer, lire, mettre à jour, supprimer) est un acronyme 
// pour les façons dont on peut fonctionner sur des données stockées. 

require_once('vue/head.php');
require_once('modele/connect_bdd.php');
//resetDb();

$basedir = dirname($_SERVER['PHP_SELF']); //dirname — Renvoie le chemin du dossier parent
$uri = $_SERVER['REQUEST_URI'];
$route = str_replace($basedir, '', $uri);
//str_replace — Remplace toutes les occurrences dans une chaîne

echo $route . '<br>';
//GET : recevoir /POST : envoyer
$table = $_GET['table'] ?? '';
$id = intval($_GET['id'] ?? -1); //intval — Retourne la valeur numérique entière équivalente d'une variable
$op = $_GET['op'] ?? '';


// switch équivaut à une série d'instructions if
switch ($table) {
    case 'tag';
        require('controleur/TagController.php');
        break;
    case 'student';
        require('controleur/StudentController.php');
        break;
    case 'project';
        require('Controleur/ProjectController.php');
        break;
}

require_once('vue/foot.php');
?>

<!-- L'expression require_once est identique à require mis à part que PHP vérifie si le fichier a déjà été inclus, 
et si c'est le cas, ne l'inclut pas une deuxième fois. -->