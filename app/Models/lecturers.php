<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class lecturer extends Model {
    protected $table = "lecturers";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function traininglecturer() {
    	return $this->belongsto('App\Models\trainings', 'TrainingId', 'id');
    }//pnppposition
}
