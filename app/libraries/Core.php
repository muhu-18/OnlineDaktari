<!-- Main App Core  Class Resides Here -->
<?php
// Core App Class
class Core{
    // If there are no other controllers in the controller file, this page will automatically be loaded
    protected $currentController = "Pages";
    // Load index method 
    protected $currentMethod = 'index';
    // 
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl();
        // Check inside controllers for first value, ucwords will capitalize the first letter
        if(file_exists('../app/controllers/'.ucwords($url[0]).'.php')){
            // Create a new controller
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        // Require the controller
        require_once '../app/controllers/'.$this->currentController.'.php';
        $this->currentController = new $this->currentController;
        
        if(isset($url[1])){
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        // Get Parameters
        $this->params = $url ? array_values($url) : [];
        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            // trim the last foward slash in the url
            $url = rtrim($_GET['url'], '/');
            // filter variables as strings or numbers
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // break url into an array
            $url = explode('/', $url);
            return $url;
        }
    }
}