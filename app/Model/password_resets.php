<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class password_resets extends Model
{
    protected $table = "password_resets";
    protected $primaryKey = "ID";
    public $timestamps = false;
}
