<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingLecturer extends Model
{
     protected $table = "TrainingLecturer";
    protected $primaryKey = "lecturer_id";
    public $timestamps = false;
}
