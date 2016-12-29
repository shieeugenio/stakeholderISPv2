<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AC_Sector extends Model
{
    protected $table = "AC_Sector";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function personnelsector()
    {
    	return $this->hasMany('App\Models\Personnel_Sector', 'ac_sector_id');
    }
}
