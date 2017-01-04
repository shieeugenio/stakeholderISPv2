<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unit_offices extends Model
{
    protected $table = "unit_offices";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\Police_Advisory', 'policeoffice_id');
    }

    public function secondary()
    {
    	return $this->hasMany('App\Models\unit_offices', 'UnitOfficeID');
    }
}
