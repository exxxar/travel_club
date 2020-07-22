<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FullName',
        'Age',
        'Sex',
        'Birthday',
        'Passport',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function user()
    {
        return $this->hasOne(\App\User::class,'id','UserId');
    }

    public function tours()
    {
        return $this->hasMany(\App\UserTour::class,'UserId','UserId');
    }

    public function tickets()
    {
        return $this->hasMany(\App\UserTicket::class,'UserId','UserId');
    }
}
