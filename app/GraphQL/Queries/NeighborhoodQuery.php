<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Neighborhood;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class NeighborhoodQuery extends Query
{
    protected $attributes = [
        'name' => 'neighborhood',
        'description' => 'Retorna los barrios'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type("Neighborhood"));
    }

    public function args(): array
    {
        return [

        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Neighborhood::all();
    }
}
