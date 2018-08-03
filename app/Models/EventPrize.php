<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrize extends Model
{
    protected $guarded=[];
    public function getname(){
        return $this->hasOne(Event::class,'id','events_id');
    }
}
