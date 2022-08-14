<?php

namespace App\modules\graphql\type;

use App\modules\graphql\entities\User as UserEntity;
use App\modules\graphql\repositories\AutonomyRepository;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class User extends ObjectType
{
    private static $instance;

    private AutonomyRepository $autonomyRepository;
    public function __construct()
    {
        $this->autonomyRepository = new AutonomyRepository();

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
                'autonomyId' => [
                    'type' => Type::string(),
                    'description' => 'Belong Autonomy id',
                    'resolve' => fn(UserEntity $user) => $user->getAutonomyId(),
                ],
                'autonomy' => [
                    'type' => Autonomy::getInstance(),
                    'description' => 'Belong Autonomy',
                    'resolve' => fn(UserEntity $user) => $this->autonomyRepository->getById($user->getAutonomyId()),
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