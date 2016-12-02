<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainings extends Model
{
   	protected $table = "Trainings";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function adviser()
    {
    	return $this->belongsTo('App\Models\Advisers', 'ID');
    }

    public function lecturer()
    {
    	return $this->hasMany('App\Models\Lecturers', 'training_id');
    }
}
