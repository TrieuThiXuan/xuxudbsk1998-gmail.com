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
        'address',
        'payment_instrument',
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

    CONST VI_DIEN_TU = 0;
    CONST THE_NGAN_HANG = 1;
    CONST PAYMENT_INSTRUMENT = [
        self::VI_DIEN_TU => 'Ví điện tử',
        self::THE_NGAN_HANG => 'Thẻ ngân hàng',
    ];

    public function promotionImages()
    {
        $this->hasMany(PromotionImage::class);
    }

    public function category()
    {
//        dd(123);
        return $this->belongsTo(Category::class, 'category_id');
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

    public function scopeSearchByPay($query, $request)
    {
        $promtion = Promotion::all();
        $vendor = User::where('payment_instrument', $request)->select('id')->get();
        dd($vendor->toArray());
        $promtion->whereIn('vendor_id', $vendor->id);
        if(isset($request)) {
            return $query->where('vendor_id', $request);
        }
    }

    public function scopeSearchByAddress($query, $request)
    {
        if(isset($request)) {
            return $query->where('address', 'like', '%' . $request . '%');
        }
    }
}
