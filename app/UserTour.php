<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTour extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserId',
        'TourInfo',
        'StartAt',
        'EndAt',
        'Comment',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'UserId' => 'integer',
        'TourInfo' => 'array',
        'Comment' => 'array',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'StartAt',
        'EndAt',
    ];


    public function userId()
    {
        return $this->belongsTo(\App\User::class);
    }
}
