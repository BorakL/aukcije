<?php
namespace App\Models;
use App\Core\Field;
class CategoryModel extends \App\Core\Model {
    protected function getFields(): Array{
        return [
            "category_id" => Field::readonlyInteger(11),
            "name" => Field::editableString(64)
        ];        
    }
}

?>