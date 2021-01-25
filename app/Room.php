<?php

namespace App;
use App\User;
use App\Furniture;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function furniture(){
        return $this->hasOne(Furniture::class);
    }
}
