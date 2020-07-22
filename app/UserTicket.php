<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'UserId',
        'TourId',
        'TicketInfo',
        'TotalPayment',
        'CurrentPayment',
        'ContactPhone',
        'DepartureAt',
        'DepartureFrom',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'UserId' => 'integer',
        'TourId' => 'integer',
        'TicketInfo' => 'array',
        'TotalPayment' => 'double',
        'CurrentPayment' => 'double',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'DepartureAt',
        'deleted_at',
    ];


    public function userTour()
    {
        return $this->hasOne(\App\UserTour::class);
    }

    public function userId()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function tourId()
    {
        return $this->belongsTo(\App\UserTour::class);
    }
}
