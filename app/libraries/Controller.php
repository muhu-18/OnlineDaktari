<!-- This is the base controller class -->
<?php
// Load the model and the view
class Controller{
    public function model($model){
        // require model file
        require_once '../app/models/'.$model.'.php';
        // instantiate model
        return new $model();
    }
    // Load the view after checking for the file first
    public function view($view, $data = []){      
        if(file_exists('../app/views/'.$view.'.php')){
            require_once '../app/views/'.$view.'.php';
        }else{
            die("The view does not exist");
        }
    }
}