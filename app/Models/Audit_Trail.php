<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit_Trail extends Model
{
    protected $table = "Audit_Trail";
    protected $primaryKey = "id";
    protected $timestamps = true;

    public function users(){
    	return $this->belongsTo('App\Models\users', 'user_id', 'id');
    }
}
