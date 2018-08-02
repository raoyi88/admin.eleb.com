<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasRoles;
    protected $guard_name = 'web';
    protected $guarded = [];
    public function getname(){
        return $this->hasOne(Shop::class,'id','shop_id');
    }
}
