<?php
require_once('vue/head.php');
require_once('modele/connect_bdd.php');
//resetDb();

$basedir = dirname($_SERVER['PHP_SELF']);
$uri = $_SERVER['REQUEST_URI'];
$route = str_replace($basedir, '',$uri);

echo $route . '<br>';

$table = $_GET['table'] ?? '';
$id = intval($_GET['id'] ?? -1);
$op = $_GET['op'] ?? '';



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
