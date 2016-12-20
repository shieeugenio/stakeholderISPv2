<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $table = "Lecturer";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function lecturer()
    {
    	
    	return $this->belongsTo('App\Models\Training', 'training_id', 'ID');

    }
}
