<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class civilian_info extends Model {
	protected $table = "civilian_info";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function acposition() {
    	return $this->belongsto('App\Models\ac_positions', 'ACPositionId', 'id');
    }//acposition

    public function stakeholderhistory() {
    	return $this->belongsto('App\Models\stakeholder_history', 'SHistoryId', 'id');

    }//stakeholderhistory
    
    public function acsector() {
    	return $this->belongsto('App\Models\ac_sectors', 'ACSectorId', 'id');
    }
}
