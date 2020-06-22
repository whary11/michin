<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Institution;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class InstitutionQuery extends Query
{
    protected $attributes = [
        'name' => 'institution',
        'description' => 'Retorna las instituciones.'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type("Institution"));
    }

    public function args(): array
    {
        return [
            'institution_id' => [
                'type' => Type::int(),
                'rules' => 'exists:institutions,id'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $institutions = new Institution;
        if (isset($args['institution_id'])) {
            $institutions->whereId($args['institution_id']);
        }
        return $institutions->get();
    }
}
