<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'promotion_id',
        'time',
        'name',
        'status',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function promotion()
    {
        $this->belongsTo(Promotion::class);
    }
}
