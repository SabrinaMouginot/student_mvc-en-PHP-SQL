<?php
require('modele/Student.php');

$student = new Student();
/*$student->lastname = 'le nom du student';
$student->firstname = '';
$student->insert();
*/
//resetDb(); // Enlever le commentaire pour reset la liste

if ($op === 'delete ') { // condition du delete
    if ($id > 0) {
        $student->delete($id);
        $student = $student->tous();
        require_once('vue/student_supprimer.php');
        require_once('vue/student_liste.php');

    }
} elseif ($op === 'update') {
    require_once('vue/vue_update.php');
} else {
    $students = $student->tous(); // on récupère toute la liste des étudiants
    require_once('vue/student_liste.php'); // on affiche la liste des étudiants
}
