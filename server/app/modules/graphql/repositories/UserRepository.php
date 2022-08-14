<?php

namespace App\modules\graphql\repositories;

use App\modules\graphql\entities\User;

final class UserRepository
{
    private Const DATA = [
        ['id' => 1, 'name' => 'test1'],
        ['id' => 2, 'name' => 'test2'],
        ['id' => 3, 'name' => 'test3'],
    ];

    public function getAll(): array
    {
        $fn = fn($data) => new User($data['id'], $data['name']);
        return array_map($fn, self::DATA);
    }

    public function getById(int $id): User
    {
        foreach(self::DATA as $data) {
            if ($data['id'] === $id) {
                return new User($data['id'], $data['name']);
            }
        }

        throw new \Exception('not found data');
    }
}