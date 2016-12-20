<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Police_Position extends Model
{
    protected $table = "Police_Position";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function policeadvisory()
    {
    	return $this->hasMany('App\Models\Police_Advisory', 'police_position_id');
    }
}
