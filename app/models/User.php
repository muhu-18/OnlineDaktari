<?php
class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertLogins()
    {
        $this->db->query('INSERT INTO userlogin (username, password) VALUES(:username, :password)');
        //Bind values
        $this->db->bind(':username', $data['email']);
        $this->db->bind(':password', $data['password']);
        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertUserLocation($latitude, $longitude, $country)
    {
        $this->db->query('INSERT INTO locations (latitude, longitude, country, last_updated) VALUES(:latitude, :longitude, :country, CURDATE())');
        //Bind values
        $this->db->bind(':latitude', $latitude);
        $this->db->bind(':longitude', $longitude);
        $this->db->bind(':country', $country);
        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (first_name, last_name, phone, email, last_updated, userlogin_userlogin_id, location_location_id) VALUES(:firstName, :lastName, :email, :password, :userType,  LAST_INSERT_ID(), LAST_INSERT_ID())');
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
        $this->db->query('SELECT * FROM userlogin WHERE username = :username');

        //bind email param
        $this->db->bind(':username', $email);
        //Check if email is already registered
        if ($this->db->rowCount() > 0){
            return false;
        }else{
            return true;
        }
    }
}