<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pnp_positions extends Model {
	protected $table = "pnp_positions";
    protected $primaryKey = "id";
    public $timestamps = true;
    
    public function policeposition() {
    	return $this->hasMany('App\Models\police_info', 'PNPPositionId');
    }//police_info
}
