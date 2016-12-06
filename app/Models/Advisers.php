<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisers extends Model
{
    protected $table = "Advisers";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function advisorycouncil()
    {
    	return $this->hasOne('App\Models\AdvisoryCouncil', 'ID');
    }

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\PoliceAdvisory', 'ID');
    }
}
