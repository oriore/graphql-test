<?php

namespace App\modules\graphql\type;

use App\modules\graphql\entities\Prefecture as PrefectureEntity;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Prefecture extends ObjectType
{
    private static $instance;

    public function __construct()
    {
        $config = [
            'name' => 'Prefecture',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                    'description' => 'Unique Prefecture Id',
                    'resolve' => fn(PrefectureEntity $prefecture) => $prefecture->getId(),
                ],
                'name' => [
                    'type' => Type::string(),
                    'description' => 'Prefecture name',
                    'resolve' => fn(PrefectureEntity $prefecture) => $prefecture->getName(),
                ],
                'enName' => [
                    'type' => Type::string(),
                    'description' => 'Prefecture english name',
                    'resolve' => fn(PrefectureEntity $prefecture) => $prefecture->getEnName(),
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