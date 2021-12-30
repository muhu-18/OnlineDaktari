<?php

class Patients extends Controller
{
    public function __construct()
    {
        $this->patientModel = $this->model('Patient');
        $this->doctorModel = $this->model('Doctor');

    }

    public function doctors()
    {
        $doctors = $this->doctorModel->getDoctors();
        $data = [
            'title' => 'Doctor Profile',
            'doctors' => $doctors
        ];

        $this->view('pages/doctors', $data);

    }
}