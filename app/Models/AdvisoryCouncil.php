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
}
