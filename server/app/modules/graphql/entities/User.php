<?php

namespace App\modules\graphql\entities;

final class User 
{
    private int $id;

    private string $name;

    private string $autonomyId;

    public function __construct(int $id, string $name, string $autonomyId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->autonomyId = $autonomyId;
    }

    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAutonomyId(): string
    {
        return $this->autonomyId;
    }
}
