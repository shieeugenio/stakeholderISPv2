<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ACCategory extends Model
{
    protected $table = "ACCategory";
    protected $primaryKey = "ID";
    public $timestamps = false;

    public function subcat()
    {
    	return $this->hasMany('App\Models\ACSubcategory', 'categoryId');
    }
}
