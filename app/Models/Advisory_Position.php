<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisory_Position extends Model
{
    protected $table = "Advisory_Position";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function advisorycouncil()
    {
    	return $this->hasMany('App\Models\Advisory_Council', 'advisory_council_id');
    }
}
