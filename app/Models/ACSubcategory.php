<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ACSubcategory extends Model
{
    protected $table = "ACSubcategory";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function category()
    {
    	return $this->hasOne('App\Models\ACCategory', 'ID', 'categoryId');
    }

    public function advisorycouncil()
    {
    	return $this->hasMany('App\Models\AdvisoryCouncil', 'categoryId');
    }
}
