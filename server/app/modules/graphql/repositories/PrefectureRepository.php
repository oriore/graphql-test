<?php

namespace App\modules\graphql\repositories;

use App\modules\graphql\entities\Prefecture;

final class PrefectureRepository
{
    private Const DATA = [
        ['id' => 12, 'name' => '千葉', 'enName' => 'chiba'],
        ['id' => 13, 'name' => '東京', 'enName' => 'tokyo'],
        ['id' => 14, 'name' => '神奈川', 'enName' => 'kanagawa'],
    ];

    public function getAll(): array
    {
        return array_map(
            fn($data) => new Prefecture($data['id'], $data['name'], $data['enName']),
            self::DATA
        );
    }

    public function getById(int $id): Prefecture
    {
        foreach(self::DATA as $data) {
            if ($data['id'] === $id) {
                return new Prefecture($data['id'], $data['name'], $data['enName']);
            }
        }

        throw new \Exception('not found data');
    }
}