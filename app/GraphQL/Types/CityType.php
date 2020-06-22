<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'City',
        'description' => 'Detalle de la ciudad.'
    ];

    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::string()
            ],
            'department' => [
                'type' => GraphQL::type('Department')
            ]
        ];
    }
}
