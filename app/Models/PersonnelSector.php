<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelSector extends Model
{
    protected $table = "PersonnelSector";
    protected $primaryKey = "ac_sector_id";
    public $timestamps = false;

    public function acsector()
    {
    	return $this->hasOne('App\Models\ACSectors', 'ID', 'ac_sector_id');
    }

    public function advisorycouncil()
    {
    	return $this->hasOne('App\Models\AdvisoryCouncil', 'advisory_position_id', 'ID');
    }
}
