<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unit_offices extends Model
{
    protected $table = "unit_offices";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function primarysuboffice() {
    	return $this->hasMany('App\Models\unit_office_secondaries', 'UnitOfficeID');
    }
}
