<?php
namespace App\Models;
use App\Core\Field;
class UserModel extends \App\Core\Model {
    protected function getFields(): array{
        return [
            "user_id"       => Field::readonlyInteger(11),
            "created_at"    => Field::readonlyDateTime(),

            "username"      => Field::editableString(64),
            "forename"      => Field::editableString(255),
            "surename"      => Field::editableString(255),
            "password_hash" => Field::editableString(128),
            "email"         => Field::editableString(255),
            "is_active"     => Field::editableBit()
        ];
    }
}

?>