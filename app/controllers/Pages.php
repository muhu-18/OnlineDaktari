<?php
class Pages extends Controller{
    public function __construct()
    {
//        $this->pageModel = $this->model('Page');
    }
    public function index(){
        $data = [
            'title' => 'Home Page'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'Home Page'
        ];
        $this->view('pages/about', $data);
    }

    public function doctors(){
        $data = [
            'title' => 'Home'
        ];
        $this->view('pages/doctors', $data);
    }


    public function services(){
        $data = [
            'title' => 'Services'
        ];
        $this->view('pages/doctors', $data);
    }

    public function contact(){
        $data = [
            'title' => 'Contact'
        ];
        $this->view('pages/contact', $data);
    }
}