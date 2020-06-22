<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    // public function cities(){
    //     return $this->hasMany(City::class);
    // }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
