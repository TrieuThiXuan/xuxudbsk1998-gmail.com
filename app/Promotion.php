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

    CONST PENDING = 0;
    CONST APPROVE = 1;
    CONST PUBLISH = 2;
    CONST STATUS = [
        self::PENDING => 'Chờ duyệt',
        self::APPROVE => 'Đã duyệt',
        self::PUBLISH => 'Xuất bản'
    ];

    public function promotionImages()
    {
        $this->hasMany(PromotionImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function isVendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
