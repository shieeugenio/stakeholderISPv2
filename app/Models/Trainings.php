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
    	return $this->belongsTo('App\Models\Lecturers', 'training_id');
    }

    public function persontraining()
    {
    	return $this->hasMany('App\Models\Advisers', 'training_id');
    }
}
