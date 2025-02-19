<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];
    
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
