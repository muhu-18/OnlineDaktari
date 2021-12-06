<?php
class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (firstName, lastName, email, password, userType) VALUES(:firstName, :lastName, :email, :password, :userType)');
       //Bind values
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':userType', $data['userType']);
        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user email
    public function findUserEmail($email)
    {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE $email = :email LIMIT 1');

        //bind email param
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if ($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}