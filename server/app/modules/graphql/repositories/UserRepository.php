<?php

namespace App\modules\graphql\repositories;

use App\modules\graphql\entities\User;

final class UserRepository
{
    private Const DATA = [
        ['id' => 1, 'name' => 'test1', 'autonomyId' => '13101'],
        ['id' => 2, 'name' => 'test2', 'autonomyId' => '12204'],
        ['id' => 3, 'name' => 'test3', 'autonomyId' => '14102'],
    ];

    public function getAll(): array
    {
        return array_map(
            fn($data) => new User($data['id'], $data['name'], $data['autonomyId']),
            self::DATA
        );
    }

    public function getById(int $id): User
    {
        foreach(self::DATA as $data) {
            if ($data['id'] === $id) {
                return new User($data['id'], $data['name'], $data['autonomyId']);
            }
        }

        throw new \Exception('not found data');
    }
}