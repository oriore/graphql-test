<?php

namespace App\modules\graphql\schema;

use App\modules\graphql\repositories\UserRepository;
use App\modules\graphql\type\User;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;


final class Definition 
{
    private UserRepository $repository;
    public function __construct()
    {
        $this->repository = new UserRepository();
    }
    public function getSchema(): Schema
    {
        return new Schema([
            'query' =>  $this->getQuery(),
        ]);
    }

    private function getQuery(): ObjectType
    {
        $user = new User();
        return new ObjectType([
            'name' => 'Query',
            'fields' => [
                'user' => [
                    'type' => $user,
                    'args' => [
                        'id' => [
                            'type' => Type::int(),
                            'description' => 'Get User Id'
                        ],
                    ]
                ],
                'users' => [
                    'type' => Type::listOf($user)
                ],
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                switch($info->fieldName) {
                    case 'users':
                        return $this->repository->getAll();
                    case 'user':
                        return $this->repository->getbyId($args['id']);
                }

                throw new \RuntimeException('query not found');
            }
        ]);
    }
}
