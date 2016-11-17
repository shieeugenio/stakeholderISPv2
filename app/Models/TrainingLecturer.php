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
    	return $this->belongsTo('App\Models\Lecturers', 'lecturer_id', 'ID');
    }

    public function trainings()
    {
    	return $this->belongsTo('App\Models\Trainings', 'training_id', 'ID');
    }
}
