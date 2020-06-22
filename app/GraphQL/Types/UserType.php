<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'names' => [
                'type' => Type::string()
            ],
            'email' => [
                'type' => Type::string()
            ],
            'avatar' => [
                'type' => Type::string()
            ],
            'document' => [
                'type' => Type::string()
            ],
            'address' => [
                'type' => Type::string()
            ],
            'uid' => [
                'type' => Type::string()
            ],
        ];
    }
}
