<?php

namespace App\modules\graphql\schema\queries;

use App\modules\graphql\type\Prefecture as PrefectureType;
use GraphQL\Type\Definition\Type;

final class Prefecture
{
    public static function get(): array
    {
        return [
            'type' => PrefectureType::getInstance(),
            'args' => [
                'id' => [
                    'type' => Type::int(),
                    'description' => 'Get Prefecture Id'
                ],
            ]
        ];
    }

    public static function getAll(): array
    {
        return [
            'type' => Type::listOf(PrefectureType::getInstance())
        ];
    }
}