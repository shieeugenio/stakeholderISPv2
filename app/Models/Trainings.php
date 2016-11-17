<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
   	protected $table = "Trainings";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function traininglecturer()
    {
    	return $this->hasMany('App\Models\TrainingLecturer', 'training_id');
    }

    public function persontraining()
    {
    	return $this->hasMany('App\Models\PersonTraining', 'training_id');
    }
}