<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliceAdvisory extends Model
{
    protected $table = "PoliceAdvisory";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function adviser()
    {
    	return $this->hasOne('App\Models\Advisers', 'ID', 'ID');
    }

    public function policeofficetwo()
    {
    	return $this->hasOne('App\Models\PoliceOfficeSecond', 'ID', 'policeoffice_id');
    }

    public function policeposition()
    {
    	return $this->hasOne('App\Models\PolicePositions', 'ID', 'police_position_id');
    }
}
