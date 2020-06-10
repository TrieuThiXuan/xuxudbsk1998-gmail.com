<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoritePromotion extends Model
{
    protected $fillable = [
        'user_id',
        'promotion_id',
    ];

    public function users()
    {
        $this->belongsToMany(User::class);
    }

    public function promotion()
    {
        $this->belongsTo(Promotion::class);
    }
}
