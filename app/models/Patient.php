<?php

class Patient
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getPatients()
    {
        $this->db->query('SELECT * FROM patients');

        return $this->db->resultSet();
    }
}