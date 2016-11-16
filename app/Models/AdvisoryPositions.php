<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvisoryPositions extends Model
{
    protected $table = "AdvisoryPositions";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function advisorycouncil()
    {
    	return $this->hasMany('App\Models\AdvisoryCouncil', 'advisory_council_id');
    }
}
