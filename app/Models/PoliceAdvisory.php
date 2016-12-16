<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliceAdvisory extends Model
{
    protected $table = "PoliceAdvisory";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function adviser()
    {
    	return $this->belongsTo('App\Models\Advisers', 'ID', 'ID');
    }

    public function police()
    {
        return $this->hasMany('App\Models\Trainings', 'police_id');
    }

    public function policeofficetwo()
    {
    	return $this->belongsTo('App\Models\PoliceOfficeSecond', 'policeoffice_id', 'ID');
    }

    public function policeposition()
    {
    	return $this->belongsTo('App\Models\PolicePositions', 'police_position_id', 'ID');
    }
}
