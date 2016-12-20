<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Police_Office_Second extends Model
{
    protected $table = "Police_Office_Second";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\Police_Advisory', 'policeoffice_id');
    }

    public function policeoffice()
    {
    	return $this->belongsTo('App\Models\Police_Office', 'police_office_id', 'ID');
    }
}
