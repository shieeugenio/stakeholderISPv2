<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonTraining extends Model
{
    protected $table = "PersonTraining";
    protected $primaryKey = "training_id";
    public $timestamps = false;

    public function training()
    {
    	return $this->belongsTo('App\Models\Training', 'training_id', 'ID');
    }

    public function adviser()
    {
    	return $this->belongsTo('App\Models\Advisers', 'adviser_id', 'ID');
    }
}
