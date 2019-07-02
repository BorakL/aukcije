<?php
namespace App\Core;
abstract class Model {
    private $dbc;
    public function __construct(DatabaseConnection $dbc){
        $this->dbc=$dbc;
    }
    
    protected function getConnection(){
        return $this->dbc->getConnection();
    }
    
    final protected function getTableName(){
        $matches=[];
        preg_match('|^.*\\\((?:[A-Z][a-z]+)+)Model$|',get_called_class(),$matches);
        return substr(strtolower(preg_replace('|[A-Z]|','_$0',$matches[1])),1);
    }
    
    protected function getFields():array{
        return [];
    }

    final private function isFieldValueValid($fieldName,$fieldValue){
        $fields=$this->getFields();
        if(!in_array($fieldName,array_keys($fields))){
            return false;
        }
        return $fields[$fieldName]->isValid($fieldValue);
    }

    final private function checkFieldList(array $data){
        $fields = $this->getFields();
        $supportedFieldNames = array_keys($this->getFields());
        $requestedFieldNames = array_keys($data);
        
        foreach($requestedFieldNames as $requestedFieldName){
            if(!in_array($requestedFieldName, $supportedFieldNames)){
                throw new \Exception($requestedFieldName.' is not in supported field name.');
            }
            if(!$fields[$requestedFieldName]->isEditable()){
                throw new \Exception($requestedFieldName.' is not editable.');
            } 
            if(!$fields[$requestedFieldName]->isValid($data[$requestedFieldName])){
                throw new \Exception('The value in '.$requestedFieldName.' is not valid.');
            }
        }
    }
    
    public function getById($id){
        $tableName = $this->getTableName();
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM ".$tableName." WHERE ".$tableName."_id = ?;";
        $prep = $pdo->prepare($sql);
        $res = $prep->execute([$id]);
        $item = NULL;
        if($res){
            $item = $prep->fetch(\PDO::FETCH_OBJ);
        }
        return $item;
    }
    
    public function getAll(){
        $tableName = $this->getTableName();
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM ".$this->getTableName().";";
        $prep = $pdo->prepare($sql);
        $res = $prep->execute();
        $items = [];
        if($res){
            $items = $prep->fetchAll(\PDO::FETCH_OBJ);
        }
        return $items;
    }
    
    public function getByFieldName($fieldName,$value){
        $tableName = $this->getTableName();
        $pdo = $this->getConnection();
        if(!$this->isFieldValueValid($fieldName,$value)){
            throw new \Exception('Invalid field name '.$fieldName.' or value: '.$valu);
        }
        $sql = "SELECT * FROM ".$tableName." WHERE ".$fieldName." = ?";
        $prep = $pdo->prepare($sql);
        $res = $prep->execute([$value]);
        $item = NULL;
        if($res){
            $item = $prep->fetch(\PDO::FETCH_OBJ);
        }
        return $item;
    }

    public function getAllByFieldName($fieldName,$fieldValue){
        $tableName = $this->getTableName();
        $pdo = $this->getConnection();
        if(!$this->isFieldValueValid($fieldName,$fieldValue)){
            throw new \Exception('Invalid field name '.$fieldName.' or value: '.$fieldValue);
        }
        $sql = "SELECT * FROM ".$tableName." WHERE ".$fieldName." = ?";
        $prep = $pdo->prepare($sql);
        $res = $prep->execute([$fieldValue]);
        $items = [];
        if($res){
            $items = $prep->fetchAll(\PDO::FETCH_OBJ);
        }
        return $items;
    }


    public function add(array $data){

        $this->checkFieldList($data);

        $tableName = $this->getTableName();
        $sqlFieldNames = implode(', ',array_keys($data));
        $questionMarks = rtrim(str_repeat("?, ",count($data)),", ");
               
        $sql = "INSERT INTO {$tableName} ({$sqlFieldNames}) VALUES ({$questionMarks});";
        $pdo = $this->getConnection();

        $prep = $pdo->prepare($sql);  
        $res = $prep->execute(array_values($data));

        if(!$res){
            return FALSE;
        }
        return $pdo->lastInsertId();
    }


    public function edit(array $data, $id){
        $this->checkFieldList($data);

        $tableName = $this->getTableName();
        
        $listFieldsValues="";
        $values=[];
        foreach($data as $field=>$value){
            $listFieldsValues .= $field." = ?, ";
            $values[]=$value;
        }
        $listFieldsValues = rtrim($listFieldsValues, ", ");
        $values[]=$id;
        $sql = "UPDATE {$tableName} SET {$listFieldsValues} WHERE {$tableName}_id=?";
        $pdo = $this->getConnection();
        $prep = $pdo->prepare($sql);
        return $prep->execute($values);
    }

    public function deleteById($id){
        $tableName = $this->getTableName();
        $pdo = $this->getConnection();
        $sql = "DELETE FROM ".$tableName." WHERE ".$tableName."_id = ?;";
        $prep = $pdo->prepare($sql);
        $res = $prep->execute([$id]);
        return $res;
    }
}
?>