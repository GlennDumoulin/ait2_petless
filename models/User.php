<?php

class User extends BaseModel {

    protected $table = 'users';
    protected $pk = 'user_id';

    public $user_id = 0;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $isAdmin;


    public function getById($user_id) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `' . $this->pk . '` = :u_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':u_id' => $user_id ] );
        return $pdo_statement->fetchObject();
    }

    public function getUserByEmail( string $email) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':email' => $email ] );

        return $pdo_statement->fetchObject();
    }

    public function register($email) {
        global $db;

        $sql = 'SELECT COUNT(`email`) AS total FROM `' . $this->table . '` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':email'=>$email
            ]
        );
        return (int) $pdo_statement->fetchColumn();
    }

    public function login($email) {
        global $db;

        $sql = 'SELECT * FROM `' . $this->table . '` WHERE `email` = :email';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':email'=>$email
            ]
        );
        return $pdo_statement->fetchObject();
    }

}