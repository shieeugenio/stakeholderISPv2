<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingLecturer extends Model
{
    protected $table = "TrainingLecturer";
    protected $primaryKey = "lecturer_id";
    public $timestamps = false;

    public function lecturer()
    {
    	return $this->hasOne('App\Models\Lecturers', 'ID', 'lecturer_id');
    }

    public function trainings()
    {
    	return $this->hasOne('App\Models\Trainings', 'ID', 'training_id');
    }
}
