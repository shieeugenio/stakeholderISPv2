<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stakeholder_profile extends Model {
    protected $table = "stakeholder_profile";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function stakeholderhistory() {
    	return $this->hasMany('App\Models\stakeholder_history', 'SProfileId');
    }//stakeholderhistory

    public function stakeholdertraining() {
    	return $this->hasMany('App\Models\trainings', 'SProfileId');


    }//training
}
