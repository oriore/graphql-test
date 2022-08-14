<?php

namespace App\modules\graphql\repositories;

use App\modules\graphql\entities\Autonomy;

final class AutonomyRepository
{
    private Const DATA = [
        ['id' => '13101', 'name' => '千代田区', 'prefectureId' => 13],
        ['id' => '12204', 'name' => '船橋市', 'prefectureId' => 12],
        ['id' => '14102', 'name' => '横浜市神奈川区', 'prefectureId' => 14],
    ];

    public function getById(string $id): Autonomy
    {
        foreach(self::DATA as $data) {
            if ($data['id'] === $id) {
                return new Autonomy($data['id'], $data['name'], $data['prefectureId']);
            }
        }

        throw new \Exception('not found data');
    }
}