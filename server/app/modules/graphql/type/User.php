<?php

namespace App\modules\graphql\type;

use App\modules\graphql\entities\User as UserEntity;
use App\modules\graphql\repositories\PrefectureRepository;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class User extends ObjectType
{
    private static $instance;

    private PrefectureRepository $prefectureRepository;
    public function __construct()
    {
        $this->prefectureRepository = new PrefectureRepository();

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
                'prefecture' => [
                    'type' => Prefecture::getInstance(),
                    'description' => 'Belongs Prefecture',
                    'resolve' => fn(UserEntity $user) => $this->prefectureRepository->getById($user->getPrefectureId()),
                ]
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