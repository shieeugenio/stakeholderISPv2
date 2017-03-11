<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stakeholder_history extends Model {
	protected $table = "stakeholder_history";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function stakeholderprofile() {
    	return $this->belongsto('App\Models\stakeholder_profile', 'SProfileId', 'id');
    }//stakeholderprofile

    public function unitofficesecondary() {
    	return $this->belongsto('App\Models\unit_office_secondaries', 'SecondaryOfficeId', 'id');

    }//secondaryoffice

    public function unitofficetertiary() {
    	return $this->belongsto('App\Models\unit_office_tertiaries', 'TertiaryOfficeId', 'id');

    }//tertiaryoffice

    public function unitofficequaternary() {
    	return $this->belongsto('App\Models\unit_office_quaternaries', 'QuaternaryOfficeId', 'id');

    }//tertiaryoffice
    
}
