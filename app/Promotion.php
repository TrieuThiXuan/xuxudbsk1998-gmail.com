<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'name',
        'summary',
        'content',
        'began_at',
        'finished_at',
        'status',
        'published_at',
        'tag',
        'image',
        'category_id',
        'vendor_id',
    ];

    public function promotionImages()
    {
        $this->hasMany(PromotionImage::class);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function vendor()
    {
        $this->belongsTo(Vendor::class);
    }
}
