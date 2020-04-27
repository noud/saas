<?php

namespace App\GraphQL\Queries;

class Hello
{
    public function __invoke(): Array
    {
        // return 'world!';
        return ['world' => 'world!'];
    }
}