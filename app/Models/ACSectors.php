<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ACSectors extends Model
{
    protected $table = "ACSectors";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function personnelsector()
    {
    	return $this->hasMany('App\Models\PersonnelSector', 'ac_sector_id');
    }
}
