<?php
namespace App\Http\Traits;

use GraphQL\Type\Definition\Type;

trait Globals {
    // Estados
    public $active = 1;
    public $inactive = 2;

    // Códigos de respuesta
    public $succes = 201; // hasta 209
    public $warning = 210; //hasta 219
    public $error = 220; // hasta 229

    public function responseGQL($type){
        $type['code'] = [
            'type' => Type::int(),
            'description' => 'response code in the system.'
        ];
        $type['status_transaction'] = [
            'type' => Type::boolean()
        ];
        $type['message'] = [
            'type' => Type::string()
        ];
        return $type;
    } 

}


