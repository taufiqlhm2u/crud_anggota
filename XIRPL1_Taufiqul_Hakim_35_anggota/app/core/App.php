<?php 

class App 
{
    private $controller = 'HomeController';
    private $method = 'index';
    private $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

       

        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . $url[0] . 'Controller.php')) {
                $this->controller = $url[0] . 'Controller';
                unset($url[0]);
            }
        }

          if (isset($_SESSION['login'])) {
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        } else {
            $this->controller = 'loginController';
            require_once '../app/controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
        }

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }
        
        call_user_func_array([$this->controller, $this->method], $this->params);


    }
    public function parseUrl () 
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}