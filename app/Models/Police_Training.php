<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Police_Training extends Model
{
    protected $table = "Police_Training";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function policeadvisory(){
    	return $this->belongsTo('App\Models\Police_Advisory', 'police_id', 'ID');
    }

    public function policetraining(){
    	return $this->belongsTo('App\Models\Training', 'police_training_id', 'ID');
    }
}
