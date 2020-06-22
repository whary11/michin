<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Http\Traits\Globals;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginType extends GraphQLType
{
    use Globals;
    protected $attributes = [
        'name' => 'Login',
        'description' => 'A type'
    ];
    public function fields(): array
    {
        return $this->responseGQL([
            'access_token' => [
                'type' => Type::string(),
                'description' => 'access token for new request in the system.'
            ],
            'code' => [
                'type' => Type::int(),
                'description' => 'response code in the system.'
            ],
            'status_transaction' => [
                'type' => Type::boolean()
            ],
            'message' => [
                'type' => Type::string()
            ],
            'user' => [
                'type' => GraphQL::type('User')
            ]
        ]);
    }
}
