<?php
class User{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function insertLogins($email, $password)
    {
        $this->db->query('INSERT INTO userlogin (username, password) VALUES(:username, :password)');
        //Bind values
        $this->db->bind(':username', $email);
        $this->db->bind(':password', $password);
        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertUserRole($data)
    {
        if ($data['usertype'] == 'doctor'){
            $role_id = 1;
            $this->db->query('INSERT INTO userole (role_id, user_user_id) VALUES (:role_id, LAST_INSERT_ID())');
            //Bind values
            $this->db->bind(':role_id', $role_id);
            //execute the function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }   else{
            $role_id = 2;
            $this->db->query('INSERT INTO userole (role_id, user_user_id) VALUES (:role_id, LAST_INSERT_ID())');
            //Bind values
            $this->db->bind(':role_id', $role_id);
            //execute the function
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }

    public function insertUserLocation($data)
    {
        $this->db->query('INSERT INTO locations (latitude, longitude, country, last_updated) VALUES(:latitude, :longitude, :country, CURDATE())');
        //Bind values
        $this->db->bind(':latitude', $data['latitude']);
        $this->db->bind(':longitude', $data['longitude']);
        $this->db->bind(':country', $data['country']);
        //execute the function
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function register($data)
    {
        if ($data['usertype'] == 'doctor') {
            $role_id = 1;
            $this->db->query('INSERT INTO users (first_name, last_name, phone, email, role_id, last_updated, userlogin_userlogin_id, location_location_id) VALUES(:firstName, :lastName, :phone, :email, CURDATE(), LAST_INSERT_ID(), LAST_INSERT_ID())');
            //Bind values
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':role_id', $role_id);
            //execute the function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }else{
            $role_id = 2;
            $this->db->query('INSERT INTO users (first_name, last_name, phone, email, role_id, last_updated, userlogin_userlogin_id, location_location_id) VALUES(:firstName, :lastName, :phone, :email, :role_id, CURDATE(), LAST_INSERT_ID(), LAST_INSERT_ID())');
            //Bind values
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':role_id', $role_id);
            //execute the function
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function login($email, $password) {
        $this->db->query('SELECT * FROM userlogin WHERE username = :email');

        //Bind value
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount()>0) {

            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                $this->db->query('SELECT * FROM users WHERE email = :email');
                $this->db->bind(':email', $email);
                return $this->db->single();

            } else {
                return false;
            }
        }else{
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
            return true;
        }else{
            return false;
        }
    }
}