<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Police_Office extends Model
{
    protected $table = "Police_Office";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function policeofficetwo()
    {
    	return $this->hasMany('App\Models\Police_Office_Second', 'police_office_id');
    }
}
