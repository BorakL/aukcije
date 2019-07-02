<?php
namespace App\Models;
class AuctionViewModel extends \App\Core\Model {
    protected function getFields(): array{
        return [
            "auction_view_id" => \App\Core\Field::readonlyInteger(20),
            "created_at"      => \App\Core\Field::readonlyDateTime(),
            "auction_id"      => \App\Core\Field::editableInteger(11),
            "ip_address"      => \App\Core\Field::editableIpAddress(),
            "user_agent"      => \App\Core\Field::editableString(255)
        ];
    }
}
?>
