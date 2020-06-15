<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function scopeSearchByName($query, $request)
    {
        if(isset($request)) {
            $query->where('name', 'like', '%' . $request . '%');
        }
        return $query;
    }
}
