<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ac_sectors extends Model {
    protected $table = "ac_sectors";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function civiliansector() {
    	return $this->hasMany('App\Models\civilian_info', 'ACSectorId');
    }//civilian_info
}
