<?php

class Doctor
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getDoctors()
    {
        $this->db->query('SELECT * FROM users WHERE role_id=0');

        return $this->db->resultSet();
    }

}