<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'gender',
        'phone',
        'address',
        'role',
        'status',
    ];

    CONST NORMAL = 1;
    const ADMIN = 0;
    CONST VENDOR = 2;
    CONST IN_ACTIVE = 2;
    CONST ACTIVE = 1;
    CONST ROLE = [
        self::ADMIN => 'Admin',
        self::NORMAL => 'Người dùng',
        self::VENDOR => 'Người cung cấp'
    ];

    CONST GENDER = [
        0 => 'Nam',
        1 => 'Nữ',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(FavoritePromotion::class);
    }

    public function googleAccounts()
    {
        return $this->hasMany(GoogleAccount::class);
    }

    public function isPromotions()
    {
        $this->hasMany(Promotion::class);
    }

    public function isVendor()
    {
        return $this->role == self::VENDOR;
    }

    public function isAdmin()
    {
        return $this->role == self::ADMIN;
    }

    public function scopeSearchByName($query, $request)
    {
        if(isset($request)) {
            $query->where('name', 'like', '%' . $request . '%');
        }
        return $query;
    }
}
