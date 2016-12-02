<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturers extends Model
{
    protected $table = "Lecturers";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function traininglecturer()
    {
    	return $this->belongsTo('App\Models\Training', 'training_id', 'ID');
    }
}
