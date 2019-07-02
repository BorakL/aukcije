<?php
namespace App\Core;
final class Router {
    private $routes=[];
    public function __construct(){}
    public function addRoute(Route $route){
        $this->routes[]=$route;
    }
    public function &find(string $httpMethod,string $url):Route{
        foreach($this->routes as $route){
            if($route->match($httpMethod,$url)){
                return $route;
            }
        }
        return null;
    }

}
?>