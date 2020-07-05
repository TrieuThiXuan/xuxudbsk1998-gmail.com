<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Carbon;

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
        'category_promotion_id',
        'status_use',
        'discount',
        'priority',
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

    CONST AC_PRIORITY = 1;
    CONST IN_PRIORITY = 0;

    CONST PRIORITY = [
        self::AC_PRIORITY => 'Ưu tiên',
        self::IN_PRIORITY => 'Bình thường',
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

    public function scopeSearchByKeyWord($query, $request){
        if(isset($request)) {
            return $query->where('name', 'like', '%' . $request . '%')
                ->orWhere('summary', 'like', '%' . $request . '%');
        }
    }

    public function scopeSearchByCategoryPortal($query, $request){
        if(isset($request)) {
            return $query->where('category_id', $request);
        }
    }

    public function scopeSearchByTime($query, $request){
        if(isset($request->time_began) && isset($request->time_finished)) {
            $began_at = Carbon::parse($request->time_began)->format('Y-m-d');
            $finished_at = Carbon::parse($request->time_finished)->format('Y-m-d');
            return $query->whereDate('began_at', '>=',  $began_at)
                ->WhereDate('finished_at', '<=',  $finished_at);
        }
    }
}
