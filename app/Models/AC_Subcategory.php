<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AC_Subcategory extends Model
{
    protected $table = "AC_Subcategory";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function category()
    {
    	return $this->belongsTo('App\Models\AC_Category', 'categoryId', 'ID');
    }

    public function advisorycouncil()
    {
    	return $this->hasMany('App\Models\Advisory_Council', 'subcategoryId');
    }
}
