<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\modules\graphql\schema\Definition;
use GraphQL\GraphQL;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class GraphqlController
{
    /**
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $schema = (new Definition())->getSchema();
        $input = json_decode((string) $request->getBody(), true);
        $query = isset($input['query']) ? $input['query'] : null;
        $result = GraphQL::executeQuery($schema, $query);
        $response->getBody()->write(
            json_encode($result->toArray())
        );
        return $response;
    }
}