
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advisory_Council extends Model
{
    protected $table = "Advisory_Council";
    protected $primaryKey = "ID";
    public $timestamps = true;

    public function personnelsector()
    {
        return $this->hasMany('App\Models\Personnel_Sector', 'advisory_council_id');
    }

    public function acsubcategory()
    {
        return $this->belongsTo('App\Models\AC_Subcategory', 'subcategoryId', 'ID');
    }

    public function advisoryposition()
    {
        return $this->belongsTo('App\Models\Advisory_Position', 'advisory_position_id', 'ID');
    }

    public function actraining(){

        return $this->hasMany('App\Models\AC_Training', 'id_advisory');
    }
}
