<?php

namespace App\modules\graphql\repositories;

use App\modules\graphql\entities\Item;

final class ItemRepository
{
    private Const DATA = [
        ['id' => 1, 'name' => '本1', 'userId' => 1],
        ['id' => 2, 'name' => '本2', 'userId' => 1],
        ['id' => 3, 'name' => '本3', 'userId' => 2],
        ['id' => 4, 'name' => '本4', 'userId' => 1],
    ];

    public function getByUserId(int $userId, array $ids): array
    {
        $result = [];
        foreach(self::DATA as $data) {
            if ($data['userId'] === $userId) {
                $result[] = new Item($data['id'], $data['name'], $data['userId']);
            }
        }

        if ($ids) {
            $result = array_filter(
                $result,
                fn (Item $item) => in_array($item->getId(), $ids)
            );
        }

        return $result;
    }
}