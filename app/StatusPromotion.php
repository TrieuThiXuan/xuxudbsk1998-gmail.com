<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusPromotion extends Model
{
    protected $table = 'statusPromotion';
    protected $fillable = [
        'name',
    ];

//    public function promotions()
//    {
//        $this->hasMany(Promotion::class);
//    }
    public function scopeSearchByName($query, $request)
    {
        if(isset($request)) {
            $query->where('name', 'like', '%' . $request . '%');
        }
        return $query;
    }
}


