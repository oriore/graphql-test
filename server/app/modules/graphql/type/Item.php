<?php

namespace App\modules\graphql\type;

use App\modules\graphql\entities\Item as ItemEntity;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Item extends ObjectType
{
    private static $instance;
    public function __construct()
    {
        $config = [
            'name' => 'Item',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                    'description' => 'Unique item Id',
                    'resolve' => fn(ItemEntity $item) => $item->getId(),
                ],
                'name' => [
                    'type' => Type::string(),
                    'description' => 'item name',
                    'resolve' => fn(ItemEntity $item) => $item->getName(),
                ],
                'userId' => [
                    'type' => Type::int(),
                    'description' => 'User id',
                    'resolve' => fn(ItemEntity $item) => $item->getUserId(),
                ],
            ],
        ];

        parent::__construct($config);
    }

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}