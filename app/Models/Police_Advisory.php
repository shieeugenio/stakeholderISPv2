<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Police_Advisory extends Model
{
    protected $table = "Police_Advisory";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function policetraining()
    {
        return $this->hasMany('App\Models\Police_Training', 'police_id');
    }

    public function policeofficetwo()
    {
    	return $this->belongsTo('App\Models\Police_Office_Second', 'policeoffice_id', 'ID');
    }

    public function policeposition()
    {
    	return $this->belongsTo('App\Models\Police_Position', 'police_position_id', 'id');
    }

    public  function rank()
    {
        return $this->belongsTo('App\Models\ranks', 'rank_id', 'id');
    }
}
