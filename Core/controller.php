<?php
namespace App\Core;
class Controller {
    private $data=[];
    private $databaseConnection;
    public function __construct(DatabaseConnection $databaseConnection){
        $this->databaseConnection = $databaseConnection;
    }
    public function getDatabaseConnection():DatabaseConnection{
        return $this->databaseConnection;
    }
    final protected function set(string $name, $value):bool{
        $result=false;
        if(preg_match('/[a-z][a-z0-9]+([A-Z][a-z0-9]+)*/',$name)){
            $this->data[$name]=$value;
            $result=true;
        }
        return $result;
    }
    public function getData():Array{
        return $this->data;
    }
}
?>