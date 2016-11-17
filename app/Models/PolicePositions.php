<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicePositions extends Model
{
    protected $table = "PolicePositions";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\PoliceAdvisory', 'police_position_id');
    }
}
