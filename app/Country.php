<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'Name',
        'Alias',
        'OriginalName',
        'Flags',
        'Rank',
        'HasTickets',
        'HotelIsNotInStop',
        'IsProVisa',
        'IsVisa',
        'TicketsIncluded',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Flags' => 'integer',
        'Rank' => 'integer',
        'HasTickets' => 'boolean',
        'HotelIsNotInStop' => 'boolean',
        'IsProVisa' => 'boolean',
        'IsVisa' => 'boolean',
        'TicketsIncluded' => 'boolean',
    ];


    public function departCities()
    {
        return $this->hasMany(\App\DepartCity::class);
    }

    public function cities()
    {
        return $this->hasMany(\App\City::class);
    }
}
