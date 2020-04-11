<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionImage extends Model
{
    protected $fillable = [
        'image',
        'promotion_id',
    ];
}
