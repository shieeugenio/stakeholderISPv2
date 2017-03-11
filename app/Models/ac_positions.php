<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ac_position extends Model {
    protected $table = "ac_positions";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function civilianposition() {
    	return $this->hasMany('App\Models\civilian_info', 'ACPositionId');
    }//civilian_info
}
