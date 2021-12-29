<?php

class Doctors extends Controller
{
    public function __construct()
    {
        $this->doctorModel = $this->model('Doctor');
    }

    public function displayDoctors()
    {
        $doctors = $this->doctorModel->getDoctors();

        $data = [
            'title' => "Doctor List",
            'doctors' => $doctors
        ];
        $this->view('pages/doctors', $data);
    }
}