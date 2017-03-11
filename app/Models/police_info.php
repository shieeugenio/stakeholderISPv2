<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class police_info extends Model {
    protected $table = "police_info";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function pnpposition() {
    	return $this->belongsto('App\Models\pnp_positions', 'PNPPositionId', 'id');
    }//pnppposition

    public function rank() {
    	return $this->belongsto('App\Models\ranks', 'RankId', 'id');
    }//rank
    public function policetraining() {
    	return $this->hasMany('App\Models\trainings', 'PoliceInfoId');


    }//training


}
