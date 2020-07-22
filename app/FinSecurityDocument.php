<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinSecurityDocument extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'DateOfFinSecurityFrom',
        'DateOfFinSecurityTo',
        'DocumentDate',
        'DocumentNumber',
        'FinSecurityAmount',
        'OrgAddress',
        'OrgName',
        'OrgPostAddress',
        'WayToFinSecurity',
        'SourseAssuranceId',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'SourseAssuranceId' => 'integer',
    ];


    public function sourseAssuranceId()
    {
        return $this->belongsTo(\App\Sourseassurance::class);
    }
}
