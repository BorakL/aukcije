<?php
namespace App\Core;
class Route {
    private $requestMethod;
    private $pattern;
    private $controller;
    private $method;
    private function __construct($requestMethod,$pattern,$controller,$method){
        $this->requestMethod=$requestMethod;
        $this->pattern=$pattern;
        $this->controller=$controller;
        $this->method=$method;
    }
    public static function get($pattern,$controller,$method){
        return new Route("GET",$pattern,$controller,$method);
    }
    public static function post($pattern,$controller,$method){
        return new Route("POST",$pattern,$controller,$method);
    }
    public static function any($pattern,$controller,$method){
        return new Route("GET|POST",$pattern,$controller,$method);
    }
    public function match($httpMethod,$url){
        if(!preg_match('/^'.$this->requestMethod.'$/',$httpMethod)){
            return false;
        }
        return preg_match($this->pattern, $url);
    }
    public function getControllerName():string{
        return $this->controller;
    }
    public function getMethodName():string{
        return $this->method;
    }
    public function &extractArguments(string $url):array{
        $matches=[];
        $arguments=[];
        preg_match_all($this->pattern,$url,$matches);
        if(isset($matches[1])){
            $arguments=$matches[1];
        }
        return $arguments;
    }
}
?>