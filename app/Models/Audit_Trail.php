<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class audit_trail extends Model {
    protected $table = "audit_trail";
    protected $primaryKey = "id";
    protected $timestamps = true;

    public function users(){
    	return $this->belongsTo('App\Models\users', 'UserId', 'id');
    }

}
