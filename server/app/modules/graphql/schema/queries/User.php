<?php

namespace App\modules\graphql\schema\queries;

use App\modules\graphql\type\User as UserType;
use GraphQL\Type\Definition\Type;

final class User
{
    public static function get(): array
    {
        return [
            'type' => UserType::getInstance(),
            'args' => [
                'id' => [
                    'type' => Type::int(),
                    'description' => 'Get User Id'
                ],
            ]
        ];
    }

    public static function getAll(): array
    {
        return [
            'type' => Type::listOf(UserType::getInstance())
        ];
    }
}