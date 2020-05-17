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
}
