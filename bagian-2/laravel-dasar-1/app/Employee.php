<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $guarded = [];

    public function company(){
    	return $this->belongsTo('App\Company');
    }
}
