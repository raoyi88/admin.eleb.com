<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shop_category_id', 'shop_name', 'shop_img', 'shop_rating', 'brand', 'on_time', 'fengniao', 'bao',
        'piao', 'zhun', 'start_send', 'send_cost', 'notice', 'discount', 'status'];

    public function category(){
        return $this->hasOne(Shop_Categories::class,'id','shop_category_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id','shop_id');
    }

}
