<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $primaryKey = 'fid';
    public $timestamps = false;
	
	//public function item(){
//		return $this->hasMany('App\Item','oid');	
//	}
}

