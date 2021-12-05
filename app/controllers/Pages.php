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

}