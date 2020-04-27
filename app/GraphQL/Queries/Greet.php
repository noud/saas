<?php

namespace App\GraphQL\Queries;

class Greet
{
    public function __invoke($rootValue, array $args): string
    {
        return "Hello, {$args['name']}!";
    }
}