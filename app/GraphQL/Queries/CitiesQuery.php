<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\City;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CitiesQuery extends Query
{
    protected $attributes = [
        'name' => 'cities',
        'description' => 'Retorna el type de ciudad.'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('City'));
    }

    public function args(): array
    {
        return [
            'country_id' => [
                'type' => Type::nonNull(Type::int()),
                'rules' => 'exists:countries,id'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return City::whereHas('department', function($department) use($args){
            $department->whereCountryId($args['country_id']);
        })->get();
    }
}
