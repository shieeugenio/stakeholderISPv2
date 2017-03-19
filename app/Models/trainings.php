<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class training extends Model {
    protected $table = "trainings";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function stakeholderprofile() {
    	return $this->belongsto('App\Models\stakeholder_profile', 'SProfileId', 'id');
    }//policeinfo

    public function lecturer() {
    	return $this->hasMany('App\Models\lecturers', 'TrainingId');
    }//lecturer

}
