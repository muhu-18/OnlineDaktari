<?php
class Pages extends Controller{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function index(){
        $users = $this->userModel->getUsers();
        $data = [
            'title' => 'Home Page',
            'users' => $users
        ];
        $this->view('pages/index', $data);      
    }

    public function login(){
        $this->view('pages/login');
    }

    public function logout(){
        $this->view('pages/logout');
    }   

    public function doctorList(){
        $this->view('pages/doctorList');
    }

    public function doctorProfile(){
        $this->view('pages/doctorProfile');
    }

    public function patients(){
        $this->view('pages/patients');
    }

    public function about(){
        $this->view('pages/about');
    }

    public function contact(){
        $this->view('pages/about');
    }
}