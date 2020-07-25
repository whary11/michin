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
            'primer_nombre' => [
                'type' => Type::string()
            ],
            'segundo_nombre' => [
                'type' => Type::string()
            ],
            'primer_apellido' => [
                'type' => Type::string()
            ],
            'segundo_apellido' => [
                'type' => Type::string()
            ],
            'email' => [
                'type' => Type::string()
            ],
        ];
    }
}
