<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisers extends Model
{
    protected $table = "Advisers";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function advisorycounsil()
    {
    	return $this->hasMany('App\Models\AdvisoryCouncil', 'ID');
    }

    public function persontraining()
    {
    	return $this->hasMany('App\Models\PersonTraining', 'training_id');
    }

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\PoliceAdvisory', 'ID');
    }
}
