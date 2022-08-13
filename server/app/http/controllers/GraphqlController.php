<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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
        $result = ['hogehoge' => 'fugafuga'];
        $response->getBody()->write(json_encode($result));
        return $response;
    }
}