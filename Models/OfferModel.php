<?php
namespace App\Models;
class OfferModel extends \App\Core\Model {
    protected function getFields(): array{
        return [
            "offer_id" => \App\Core\Field::readonlyInteger(20), 	
            "created_at" => \App\Core\Field::readonlyDateTime(),

            "user_id"=> \App\Core\Field::editableInteger(11), 			 	
            "auction_id"=> \App\Core\Field::editableInteger(11),	
            "price"=> \App\Core\Field::editableMaxDecimal(7,2)
        ];
    }
}
?>

