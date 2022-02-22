<?php

include('env.php');

$bdd_username = $bdd_username  ?? 'student';
$bdd_password = $bdd_password  ?? 'student';
$bdd_port = 3306;
$bdd_host = 'localhost';
$bdd_dbname = $bdd_dbname  ?? 'student';
//DSN : data Source Name
$dsn = "mysql:host=$bdd_host; port=$bdd_port;dbname=$bdd_dbname; charset=utf8";


$options = [
    PDO::ATTR_ERRMODE => 
    PDO:: ERRMODE_EXCEPTION,

    PDO ::ATTR_DEFAULT_FETCH_MODE =>
    PDO :: FETCH_ASSOC //RENVOIE UN TABLEAU ASSOCIATIF (colonne de base de données)
//fetch_assoc enlève les doublons
];

//PDO : PHP Data Objects
//$pdo = new PDO ($dsn, $bdd, $bdd_passwort, $options);

try{
    $pdo = new PDO($dsn, $bdd_username, $bdd_passwort, $options); //récupérer une variable définit en dehors du global
} catch (PDOException $e) {     //catch attrape l'erreur
    echo "Erreur connection à la base de données <br>";
    echo $e->getCode() . ' ' . $e->getMessage() . '<br>';
    //$e l'object exception
    http_response_code (500); // on respecte le code http
    $pdo = null;
}

function getPdo() // renvoie notre variable PDO
{
    global $pdo;
    return $pdo;

}

function resetDb() //réinitialiser notre base de données
{
    global $pdo;
    $sql = file_get_contents('modele/student.sql');
    $pdo->exec($sql);
}
