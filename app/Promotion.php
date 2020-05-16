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
    CONST STATUS = [
        0 => 'chờ duyệt',
        1 => 'đã duyệt'
    ];
    public function promotionImages()
    {
        $this->hasMany(PromotionImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor()
    {
        $this->belongsTo(Vendor::class);
    }
}
