<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AC_Category extends Model
{
    protected $table = "AC_Category";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function subcat()
    {
    	return $this->hasMany('App\Models\AC_Subcategory', 'categoryId');
    }
}
