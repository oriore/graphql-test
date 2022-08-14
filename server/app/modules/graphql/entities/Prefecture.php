<?php

namespace App\modules\graphql\entities;

final class Prefecture
{
    private int $id;

    private string $name;

    private string $enName;

    public function __construct(int $id, string $name, string $enName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->enName = $enName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEnName(): string
    {
        return $this->enName;
    }
}
