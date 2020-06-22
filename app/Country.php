<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
