<?php

namespace App\modules\graphql\type;

use App\modules\graphql\entities\Autonomy as AutonomyEntity;
use App\modules\graphql\repositories\PrefectureRepository;
use App\modules\graphql\type\Prefecture;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Autonomy extends ObjectType
{
    private static $instance;

    private PrefectureRepository $prefectureRepository;
    public function __construct()
    {
        $this->prefectureRepository = new PrefectureRepository();
        $config = [
            'name' => 'Autonomy',
            'fields' => [
                'id' => [
                    'type' => Type::id(),
                    'description' => 'Unique Autonomy Id',
                    'resolve' => fn(AutonomyEntity $autonomy) => $autonomy->getId(),
                ],
                'name' => [
                    'type' => Type::string(),
                    'description' => 'Autonomy name',
                    'resolve' => fn(AutonomyEntity $autonomy) => $autonomy->getName(),
                ],
                'prefectureId' => [
                    'type' => Type::int(),
                    'description' => 'Belong prefecture id',
                    'resolve' => fn(AutonomyEntity $autonomy) => $autonomy->getPrefectureId(),
                ],
                'prefecture' => [
                    'type' => Prefecture::getInstance(),
                    'description' => 'Belong prefecture',
                    'resolve' => fn(AutonomyEntity $autonomy) => $this->prefectureRepository->getById($autonomy->getPrefectureId()),
                ],
            ],
        ];

        parent::__construct($config);
    }

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}