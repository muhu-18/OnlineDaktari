<?php
class Pages extends Controller{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
        $this->doctorModel = $this->model('Doctor');
    }
    public function index(){
        $data = [
            'title' => 'Home Page'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Page'
        ];
        $this->view('pages/about', $data);
    }

    public function doctors(){
        $doctors = $this->doctorModel->getDoctors();
        $data = [
            'title' => 'Doctors',
            'doctors' => $doctors
        ];
        $this->view('pages/doctors', $data);
    }


    public function services(){
        $data = [
            'title' => 'Services'
        ];
        $this->view('pages/services', $data);
    }

    public function contact(){
        $data = [
            'title' => 'Contact'
        ];
        $this->view('pages/contact', $data);
    }

    public function schedule()
    {
        $this->view('pages/schedule');
    }

    public function checkout()
    {
        $this->view('pages/checkout');
    }

    public function success()
    {
        $this->view('pages/success');
    }

    public function cancel()
    {
        $this->view('pages/cancel');
    }

    public function appointments()
    {
        $this->view('pages/appointments');
    }

    public function video()
    {
        $this->view('pages/video');
    }
}