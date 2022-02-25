<?php
require('modele/Student.php');

$student = new Student();
/*$student->lastname = 'le nom du student';
$student->firstname = 'le prénom du student';
$student->insert();
*/

//resetDb(); // Enlever le commentaire pour reset la liste

// if ($op === 'delete') { // condition du delete
//     if ($id > 0) {
//         $student->delete($id);
//         $students = $student->tous();
//         require_once('vue/student_supprimer.php');
//         require_once('vue/student_liste.php');
//     }
// } elseif ($op === 'update') {
//     require_once('vue/student_update.php');
// } elseif ($op === 'insert') {
//     require_once('vue/student_liste.php');
//     echo $_POST["firstname"]; //pour récupérer les données
//     if (!filter_var($firstname, FILTER_VALIDATE_BOOLEAN) === false) { //pour filtrer valider les données
//         echo ("$firstname is a valid firstname");
//     } else {
//         echo ("$firstname is not a valid firstname");
//     }
//     UPDATE student //mettre à jour la base de données
//     SET firstname, Lastname=valeur2 
//     WHERE some_colonne=some_value;

// } else {
//     $students = $student->tous(); // on récupère toute la liste des tags
//     require_once('vue/student_liste.php'); // on affiche la liste des tags
// } // OU JE PEUX FAIRE UN SWITCH


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
    case 'insert':
        $id = 0;
        require_once('vue/student_update.php');
        break;
    case 'liste':
        $students = $student->tous();
        require_once('vue/student_liste.php');
        break;
    case 'submit':
        // require_once('vue/student_liste.php');
        //1 recupérer les données du formulaire
        echo '<pre>';
        var_dump($_POST);
        echo ('</pre>');

        if ($id > 0)
            $student->select($id);

        //2 filtrer valider ses données (FILTER_VALIDATE)
        $firstname = trim(filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $ok = true;
        if (mb_strlen($firstname) > 0) {
            echo ("$firstname is a valid firstname");
        } else {
            echo ("$firstname is not a valid firstname");
            $ok = false;
        }

        $lastname = trim(filter_var($_POST["lastname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        if (mb_strlen($lastname) > 0) {
            echo ("$lastname is a valid lastname");
        } else {
            echo ("$lastname is not a valid lastname");
            $ok = false;
        }

        if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
            echo ("email invalide");
            $ok = false;
        } else {
            $student->email = trim($_POST['email']);
        }

        if (!filter_input(INPUT_POST, 'school_year_id', FILTER_VALIDATE_INT)) {
            echo ("school_year_id invalide");
            $ok = false;
        } else {
            $student->school_year_id = intval($_POST['school_year_id']);
        }

        if (!filter_input(INPUT_POST, 'project_id', FILTER_VALIDATE_INT)) {
            echo ("project_id invalide");
            $ok = false;
        } else {
            $student->project_id = intval($_POST['project_id']);
        }


        //3 mettre à jour la BDD UPDATE
        if ($ok) {
            $student->id = $id;
            $student->firstname = $firstname;
            $student->lastname = $lastname;
            if ($id > 0)
                $student->update();
            else
                $student->insert();
        }
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
