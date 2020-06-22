<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Http\Traits\Globals;
use App\User;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class LoginMutation extends Mutation
{
    use Globals;
    protected $attributes = [
        'name' => 'login',
        'description' => 'Mutation giving access to the system.'
    ];

    public function type(): Type
    {
        return GraphQL::type('Login');
    }

    public function args(): array
    {
        return [
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['exists:users,email', 'required']
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
                'description' => 'sha1 of the password.'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $credentials = ['email' => $args['email'], 'password' => $args['password'], 'is_active' => 1];
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::id());
            $access_token = $user->createToken('Token Name')->accessToken;
            return [
                'access_token' => $access_token,
                'code' => $this->succes,
                'status_transaction' => true,
                'message' => 'login.',
                'user' => $user
            ];
        }
        return [
            'code' => $this->error,
            'status_transaction' => false,
            'message' => 'failure.',
        ];
    }
}
