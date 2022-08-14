<?php

namespace App\modules\graphql\entities;

final class Autonomy
{
    private string $id;

    private string $name;

    private int $prefectureId;

    public function __construct(string $id, string $name, int $prefectureId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->prefectureId = $prefectureId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrefectureId(): int
    {
        return $this->prefectureId;
    }
}
