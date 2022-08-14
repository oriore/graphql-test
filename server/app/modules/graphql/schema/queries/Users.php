<?php

namespace App\modules\graphql\schema\queries;

use App\modules\graphql\type\User;
use GraphQL\Type\Definition\Type;

final class Users
{
    public static function get(): array
    {
        return [
            'type' => Type::listOf(User::getInstance())
        ];
    }
}