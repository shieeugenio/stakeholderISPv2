<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class unit_office_secondaries extends Model
{
    protected $table = "unit_office_secondaries";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function unitoffice() {
    	return $this->belongsTo('App\Models\unit_offices', 'UnitOfficeID', 'id');
    }

    public function secondarysuboffice() {
        return $this->hasMany('App\Models\unit_office_tertiaries', 'UnitOfficeSecondaryID');
    }

    public function stakeholdersecondary()
    {
        return $this->hasMany('App\Models\stakeholder_history', 'SecondaryOfficeId');
    }
}
