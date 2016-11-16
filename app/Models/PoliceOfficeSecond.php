<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliceOfficeSecond extends Model
{
    protected $table = "PoliceOfficeSecond";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\PoliceAdvisory', 'policeoffice_id');
    }

    public function policeoffice()
    {
    	return $this->hasOne('App\Models\PoliceOffices', 'ID', 'police_office_id');
    }
}
