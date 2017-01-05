<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
   	protected $table = "Training";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function advisorytraining()
    {
        return $this->hasMany('App\Models\AC_Training', 'id_training');	
    }

    public function policetraining()
    {
        return $this->hasMany('App\Models\Police_Training', 'police_training_id'); 
    }

    public function lecturer()
    {
        return $this->hasMany('App\Models\Lecturer', 'training_id');
    }

    
}
