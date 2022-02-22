<?php
require('modele/Student.php');

$student = new Student();
/*$student->lastname = 'le nom du student';
$student->firstname = '';
$student->insert();
*/
//resetDb(); // Enlever le commentaire pour reset la liste

// if ($op === 'delete ') { // condition du delete
//     if ($id > 0) {
//         $student->delete($id);
//         $student = $student->tous();
//         require_once('vue/student_supprimer.php');
//         require_once('vue/student_liste.php');

//     }
// } elseif ($op === 'update') {
//     require_once('vue/vue_update.php');
// } else {
//     $students = $student->tous(); // on récupère toute la liste des étudiants
//     require_once('vue/student_liste.php'); // on affiche la liste des étudiants
// }

switch ($op) {
    case 'delete':
        if ($id > 0) {
            $student->delete($id);
            $students = $student->tous();
            require_once('vue/student_supprimer.php');
            require_once('vue/student_liste.php');
        }
        break;
    case 'update':
        require_once('vue/student_update.php');
        break;
    case 'liste':
        $students = $student->tous();
        require_once('vue/student_liste.php');
        break;
    case 'submit':
        // require_once('vue/student_liste.php');
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
        $student = new Student();
        $student->select($id);
        $student->name = $name;
        $student->description = $description;
        $student->update();
        //4 générer la réponse
        //4a sélectionner les données pour la réponse
        //4b sélectionner la vue pr la rép.
        $students = $student->tous(); // on récupère toute la liste des students
        require_once('vue/student_liste.php');
        break;
    default:
        $students = $student->tous(); // on récupère toute la liste des étudiants
        require_once('vue/student_liste.php'); // on affiche la liste des étudiants
}
