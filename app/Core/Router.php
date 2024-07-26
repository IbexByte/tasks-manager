<?php
namespace App\Core;

class Router
{

    private $get = [];
    private $post = [];


    public static function make(){
        $router = new self ;
        return $router ;
    }

    public  function post($route, $action){
         $this->post[$route] = $action;
         return $this;
    }

    public  function get($route, $action){
         $this->get[$route] = $action;
         return $this;

    }

    public function resolve($uri, $methode)
    {
        
       if (array_key_exists($uri,$this->{$methode})) {
       $action = $this->{$methode}[$uri] ;
       $this->callAction(...$action);
     
       } else {
        throw new \Exception('Page Not Found!');
       }
       
    }

    protected function callAction($controller, $action)
    {
        $controller = new $controller;
       
        $controller->{$action}();
     
        
    }

}