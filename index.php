<?php
require "vendor/Autoload.php";
require "configuration.php";
$databaseConfiguration = new \App\Core\DatabaseConfiguration(
    Configuration::DATABASE_HOST,
    Configuration::DATABASE_USER,
    Configuration::DATABASE_PASS,
    Configuration::DATABASE_NAME);
$databaseConnection = new \App\Core\DatabaseConnection($databaseConfiguration);

$httpMethod=filter_input(INPUT_SERVER,"REQUEST_METHOD");
$url=strval(filter_input(INPUT_GET,"URL"));

$routes = require_once "Routes.php";
$router=new \App\Core\Router();
foreach($routes as $route){
    $router->addRoute($route);
}
$route=$router->find($httpMethod,$url);
$arguments=$route->extractArguments($url);

$controllerFullName= '\App\Controllers\\'.$route->getControllerName().'Controller';
$controller=new $controllerFullName($databaseConnection);
$method=$route->getMethodName();

call_user_func_array([$controller,$method],$arguments);

$data=$controller->getData();

$loader = new Twig_Loader_Filesystem("Views");
$twig = new Twig_Environment($loader,[
    "cache"=>"./twig-cache",
    "auto_reload"=>true
]);

$html = $twig->render(
    $route->getControllerName().'/'.$route->getMethodName().'.html',
    $data
);
echo $html;

?>