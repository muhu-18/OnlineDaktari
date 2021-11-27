<?php
class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

 
    public function getUsers(){
        $this->db->query("SELECT * FROM users");

        $result = $this->db->resultSet();

        return $result;
    }

    public function insertUsers(){
        $this->db->query("INSERT INTO users VALUES('user_name', 'user_email', 'password')");

        $result = $this->db->resultSet();

        return $result;
    }

    public function updateUsers(){
        $this->db->query("UPDATE users SET user_name = 'Tiberius' WHERE user_id = 1");

        $result = $this->db->resultSet();

        return $result;
    }


    public function deleteUsers(){
        $this->db->query("DELETE FROM users WHERE user_id = 1");

        $result = $this->db->resultSet();

        return $result;
    }


   
}