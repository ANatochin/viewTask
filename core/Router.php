<?php

namespace Core;

use App\Controller\Error\Error404;

class Router
{
    protected $routes;

    public function __construct()
    {
        $configPath = 'app/config/controllersConfig.php';
        $this->routes = include_once $configPath;

    }

    public function run()
    {
        $url = $this->getURL();
        $nameSpace = array_search($url, $this->routes);
        if ($nameSpace!=false ){
            $splNameSpace = explode('@', $nameSpace);

            if (class_exists($splNameSpace[0])){
                $obj = new $splNameSpace[0];
                $classMethod = $splNameSpace[1];
                if (method_exists($obj,$classMethod)){
                    $obj->$classMethod();
                }
            }else{
                $this->error();
            }
        } else {
            $this->error();
        }
    }

    public function getURL()
    {

      return (!empty($_SERVER['REDIRECT_URL'])) ? ltrim($_SERVER['REDIRECT_URL'], '/'):'home/index';

    }

    private function error(){
        $errorObj404 = new Error404();
        $errorObj404->index();
    }
}