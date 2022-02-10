<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable=['company','f_name','country','l_name','title','email','status','f_date','time', 'phone', 'a_phone', 'time_zone','website','gate_keeper_name', 'source','industry','marketing_partner','industry_details','cd','other', 'ad_spend'];
}
