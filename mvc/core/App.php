<?php
class App 
{

    protected $controller = "Home";
    protected $action = "SayHi";
    protected $params = [];

    function __construct()
    {
        
        // //GET URL
         $arr = $this->UrlProcess();

        // //Process Controller
        if (file_exists("./mvc/controllers/". $arr[0] .".php"))
        {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // //Process Action
        if (isset($arr[1]))
        {
            if(method_exists($this->controller, $arr[1])) 
            {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        //Process Params
        $this->params = $arr?array_values($arr):[];

        //Create controller
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) 
        {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    } 
}
?>