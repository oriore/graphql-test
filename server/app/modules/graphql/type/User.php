<?php

namespace App\modules\graphql\type;

use App\modules\graphql\entities\User as UserEntity;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class User extends ObjectType
{
    private static $instance;

    public function __construct()
    {
        $config = [
            'name' => 'User',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                    'description' => 'Unique User Id',
                    'resolve' => fn(UserEntity $user) => $user->getId(),
                ],
                'name' => [
                    'type' => Type::string(),
                    'description' => 'User name',
                    'resolve' => fn(UserEntity $user) => $user->getName(),
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