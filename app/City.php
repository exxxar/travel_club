<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'CountryId',
        'Name',
        'Default',
        'DescriptionUrl',
        'IsPopular',
        'ParentId',
        'OriginalName',
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

    public function parentId()
    {
        return $this->belongsTo(\App\City::class);
    }
}
