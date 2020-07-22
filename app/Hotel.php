<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'Name',
        'CommonRate',
        'IsInBonusProgram',
        'PhotosCount',
        'PopularityLevel',
        'Rate',
        'SearchCount',
        'StarId',
        'StarName',
        'TownId',
        'OriginalName',
        'BeachLineId',
        'Phone',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'IsInBonusProgram' => 'boolean',
        'Rate' => 'double',
        'StarId' => 'integer',
        'TownId' => 'integer',
    ];


    public function starId()
    {
        return $this->belongsTo(\App\Hotelstar::class);
    }

    public function townId()
    {
        return $this->belongsTo(\App\Town::class);
    }
}
