<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonTraining extends Model
{
     protected $table = "PersonTraining";
    protected $primaryKey = "training_id";
    public $timestamps = false;
}
