<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartCity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'Name',
        'CountryId',
        'Default',
        'DescriptionUrl',
        'IsPopular',
        'OriginalName',
        'ParentId',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'CountryId' => 'integer',
        'Default' => 'boolean',
        'IsPopular' => 'boolean',
        'ParentId' => 'integer',
    ];


    public function country()
    {
        return $this->belongsTo(\App\Country::class);
    }

    public function countryId()
    {
        return $this->belongsTo(\App\Country::class);
    }

    public function parentId()
    {
        return $this->belongsTo(\App\DepartCity::class);
    }
}
