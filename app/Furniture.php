<?php

namespace App;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    public function rooms(){
        return $this->belongsTo(Room::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
