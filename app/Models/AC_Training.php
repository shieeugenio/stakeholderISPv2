<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AC_Training extends Model
{
    protected $table = "AC_Training";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function advisory(){
    	return $this->belongsTo('App\Models\Advisory_Council', 'id_advisory', 'ID');
    }

    public function training(){
    	return $this->belongsTo('App\Models\Training', 'id_training', 'ID');
    }
}
