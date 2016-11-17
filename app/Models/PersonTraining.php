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
    	return $this->hasOne('App\Models\Training', 'ID', 'training_id');
    }

    public function adviser()
    {
    	return $this->hasOne('App\Models\Advisers', 'ID', 'adviser_id');
    }
}
