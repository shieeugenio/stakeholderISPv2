<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unit_office_quaternaries extends Model
{
    protected $table = "unit_office_quaternaries";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function unitofficetertiary() {
    	return $this->belongsTo('App\Models\unit_office_tertiaries', 'UnitOfficeTertiaryID', 'id');
    }

    public function stakeholderquaternary() {
    	$this->hasMany('App\Models\stakeholder_history', 'QuaternaryOfficeId');
    }
}
