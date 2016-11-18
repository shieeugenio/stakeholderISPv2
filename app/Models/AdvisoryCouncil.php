<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvisoryCouncil extends Model
{
    protected $table = "AdvisoryCouncil";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function personnelsector()
    {
    	return $this->hasMany('App\Models\PersonnelSector', 'advisory_council_id');
    }

    public function acsubcategory()
    {
    	return $this->belongsTo('App\Models\ACSubcategory', 'categoryId', 'ID');
    }

    public function advisoryposition()
    {
    	return $this->belongsTo('App\Models\AdvisoryPositions', 'advisory_position_id', 'ID');
    }

    public function advisers()
    {
    	return $this->belongsTo('App\Models\Advisers', 'ID', 'ID');
    }
}
