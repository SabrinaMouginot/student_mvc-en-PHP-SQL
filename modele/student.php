<?php

class Student
{

    public int $id;
    public string $lastname;
    public ?string $firstname;
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    public function tous()
    {
        $sql = "select id, lastname, firstname from student";
        $stmt = $this->pdo->prepare($sql);
        //requête sql $stmt = $this->pdo->prepare($sql); 
        // au dessus on cherche à comprendre la requête select id et l'optimiser,... puis en dessous on exécute 
        $stmt->execute();
        //dans le cadre d'un select, ici le execute n'est pas forcément nécessaire. Par contre ds le k d'un insert, là du coup ca exécute l'ordre 
        $data = $stmt->fetchAll();
        //avec le $data on récupère l'intégralité de la table 
        return $data;
    }

    public function insert()
    {
        $sql = 'insert into student (lastname, firstname)';
        $sql = $sql . ' values (:lastname, :firstname)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId();
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update student set lastname=:lastname, firstname=:firstname';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = 'select id, lastname, firstname from student where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->lastname = $data['lastname'];
        $this->firstname = $data['firstname'];
    }

    public function delete(int $id)
    {
        $sql = 'delete from student where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } //bindParam va se charger de gérer les caractères spéciaux et éviter les failles de sécurité. 
    //Par exemple si y a des é ou autres caractères spé dans un nom qu'on cherche à supprimer.
}
