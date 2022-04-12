<?php

// Un modèle (Model) contient les données à afficher.
// Une vue (View) contient la présentation de l'interface graphique.
// Un contrôleur (Controller) contient la logique concernant les actions effectuées par l'utilisateur.

//  CRUD (create, read, update, delete) (créer, lire, mettre à jour, supprimer) est un acronyme 
// pour les façons dont on peut fonctionner sur des données stockées. 

class Tag  //La class représente une connexion entre PHP et un serveur de base de données.
{

    public ?int $id;  // int : les entiers
    public ?string $name;
    public ?string $description; //string : chaine de caractères
    private $pdo;

    // La visibilité d'une propriété, d'une méthode ou une constante peut être définie en préfixant sa déclaration avec : 
    //public, private ou protected. 
    //Les éléments déclarés comme publics sont accessibles partout. 
    //L'accès aux éléments privés est uniquement réservé à la classe qui les a définis.
    //L'accès aux éléments protégés est limité à la classe elle-même, ainsi qu'aux classes qui en héritent et parente. 

    public function __construct() //PDO::__construct — Crée une instance PDO qui représente une connexion à la base
    {
        $this->pdo = getPdo();
    }

    public function tous()
    {
        $sql = "select id, name, description from tag";
        $stmt = $this->pdo->prepare($sql);
        //requête sql $stmt = $this->pdo->prepare($sql); 
        // au dessus on cherche à comprendre la requête select id et l'optimiser,... puis en dessous on exécute 
        $stmt->execute();
        //dans le cadre d'un select, ici le execute n'est pas forcément nécessaire. Par contre ds le k d'un insert, là du coup ca exécute l'ordre 
        $data = $stmt->fetchAll(); //fetchAll — Récupère les lignes restantes d'un ensemble de résultats
        //avec le $data on récupère l'intégralité de la table 
        return $data;
    }

    public function insert()
    {
        $sql = 'insert into tag (name, description)';
        $sql = $sql . ' values (:name, :description)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name); //bindParam — Lie un paramètre à un nom de variable spécifique
        $stmt->bindParam(':description', $this->description);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId(); //lastInsertId — Retourne l'identifiant de la dernière ligne insérée ou la valeur d'une séquence
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update tag set name=:name, description=:description where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = 'select id, name, description from tag where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo $id;
    
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
    }

    public function delete(int $id)
    {
        $sql = 'delete from tag where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } //bindParam va se charger de gérer les caractères spéciaux et éviter les failles de sécurité. 
    //Par exemple si y a des é ou autres caractères spé dans un nom qu'on cherche à supprimer.
}
