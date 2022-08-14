<?php

namespace App\modules\graphql\schema;

use App\modules\graphql\repositories\UserRepository;
use App\modules\graphql\repositories\PrefectureRepository;
use App\modules\graphql\schema\queries\User;
use App\modules\graphql\schema\queries\Prefecture;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

final class Definition 
{
    private UserRepository $userRepository;
    private PrefectureRepository $prefectureRepository;
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->prefectureRepository = new PrefectureRepository();
    }
    public function getSchema(): Schema
    {
        return new Schema([
            'query' =>  $this->getQuery(),
        ]);
    }

    private function getQuery(): ObjectType
    {
        return new ObjectType([
            'name' => 'Query',
            'fields' => [
                'user' => User::get(),
                'users' => User::getAll(),
                'prefecture' => Prefecture::get(),
                'prefectures' => Prefecture::getAll(),
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                switch($info->fieldName) {
                    case 'users':
                        return $this->userRepository->getAll();
                    case 'user':
                        return $this->userRepository->getbyId($args['id']);
                    case 'prefecture':
                        return $this->prefectureRepository->getbyId($args['id']);
                    case 'prefectures':
                        return $this->prefectureRepository->getAll();
                }

                throw new \RuntimeException('query not found');
            }
        ]);
    }
}
