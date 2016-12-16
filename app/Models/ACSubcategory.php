<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ACSubcategory extends Model
{
    protected $table = "ACSubcategory";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function category()
    {
    	return $this->belongsTo('App\Models\ACCategory', 'categoryId', 'ID');
    }

    public function advisorycouncil()
    {
    	return $this->hasMany('App\Models\AdvisoryCouncil', 'categoryId');
    }
}
