<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact',
        'phone',
    ];

    public function promotions()
    {
        $this->hasMany(Promotion::class);
    }
}
