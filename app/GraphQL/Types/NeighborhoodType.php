<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class NeighborhoodType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Neighborhood',
        'description' => 'A type'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::string(),
            ],
        ];
    }
}
