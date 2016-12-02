<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelSector extends Model
{
    protected $table = "PersonnelSector";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function acsector()
    {
    	return $this->belongsTo('App\Models\ACSectors', 'ac_sector_id', 'ID');
    }

    public function advisorycouncil()
    {
    	return $this->belongsTo('App\Models\AdvisoryCouncil', 'advisory_council_id', 'ID');
    }
}
