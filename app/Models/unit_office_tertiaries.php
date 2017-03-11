<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unit_office_tertiaries extends Model
{
    protected $table = "unit_office_tertiaries";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function unitofficesecondary()
    {
    	return $this->belongsTo('App\Models\unit_office_secondaries', 'UnitOfficeSecondaryID', 'id');
    }

    public function tertiarysuboffice()
    {
        return $this->hasMany('App\Models\unit_office_quaternaries', 'UnitOfficeTertiaryID');
    }

    public function stakeholdertertiary()
    {
        return $this->hasMany('App\Models\stakeholder_history', 'TertiaryOfficeId');
    }
}
