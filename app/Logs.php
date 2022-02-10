<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $fillable = ['admin_id','user_id','message'];
}
