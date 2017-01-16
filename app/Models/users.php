<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function audittrail(){
    	return $this->hasMany('App\Models\Audit_Trail', 'user_id');
    }
}
