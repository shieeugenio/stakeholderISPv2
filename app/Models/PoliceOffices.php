<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoliceOffices extends Model
{
    protected $table = "PoliceOffices";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function policeofficetwo()
    {
    	return $this->hasMany('App\Models\PoliceOfficeSecond', 'police_office_id');
    }
}
