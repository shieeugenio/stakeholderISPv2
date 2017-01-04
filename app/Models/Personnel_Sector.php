<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel_Sector extends Model
{
    protected $table = "Personnel_Sector";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function acsector()
    {
    	return $this->belongsTo('App\Models\AC_Sector', 'ac_sector_id', 'ID');
    }

    public function advisorycouncil()
    {
    	return $this->belongsTo('App\Models\Advisory_Council', 'advisory_council_id', 'ID');
    }
}
