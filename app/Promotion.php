<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

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

    CONST PENDING = 'c';
    CONST APPROVE = 'a';
    CONST PUBLISH = 'p';
    CONST STATUS = [
        self::PENDING => 'Chờ duyệt',
        self::APPROVE => 'Đã duyệt',
        self::PUBLISH => 'Xuất bản'
    ];

    CONST OTHER_STATUS = [
        self::PENDING => 'Chờ duyệt',
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

    public function scopeSearchByName($query, $request)
    {
        if(isset($request)) {
            $query->where('name', 'like', '%' . $request . '%');
        }
        return $query;
    }

    public function scopeSearchByCategory($query, $request)
    {
        if(isset($request)) {
            return $query->where('category_id', $request);
        }
    }

    public function scopeSearchByStatus($query, $request)
    {
        if(isset($request)) {
            return $query->where('status', $request);
        }
    }

    public function customers()
    {
        return $this->belongsToMany(User::class);
    }
}
