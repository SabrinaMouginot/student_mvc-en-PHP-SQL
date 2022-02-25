<?php

class Student
{

    public int $id;
    public ?string $school_year_id;
    public ?string $project_id;
    public ?string $lastname;
    public ?string $firstname;
    public ?string $email;
    public ?string $created_at;
    public ?string $updated_at;
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    public function tous()
    {
        $sql = "select id, school_year_id, project_id, lastname, firstname, email, created_at, updated_at from student";
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
        $sql = 'insert into student (school_year_id, project_id, lastname, firstname, email, created_at, updated_at)';
        $sql = $sql . 'values (:school_year_id, :project_id, :lastname, :firstname, :email, now(), now())';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':school_year_id', $this->school_year_id);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':email', $this->email);
        //$stmt->bindParam(':created_at', $this->created_at);
        //$stmt->bindParam(':updated_at', $this->updated_at);
        $stmt->execute();
        $this->id = $this->pdo->lastInsertId();
        $this->select($this->id);
    }

    public function update()
    {
        $sql = 'update student set school_year_id=:school_year_id, project_id=:project_id, lastname=:lastname, firstname=:firstname, email=:email, updated_at=now() where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':school_year_id', $this->school_year_id);
        $stmt->bindParam(':project_id', $this->project_id);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
           $this->select($this->id);
    }

    public function select(int $id)
    {
        $sql = 'select id, school_year_id, project_id, lastname, firstname, email, created_at, updated_at from student where id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->school_year_id = $data['school_year_id'];
        $this->project_id = $data['project_id'];
        $this->lastname = $data['lastname'];
        $this->firstname = $data['firstname'];
        $this->email = $data['email'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
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
