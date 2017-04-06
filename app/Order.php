<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
	//protected $table = 'ordsn';
	protected $fillable = [
		'oid',
        'ordsn',
        'uid',
        'openid',
        'xm',
        'address',
        'tel',
        'momey',
        'isplay',
        'ordtime',
        'issent',
		'issign'
    ];
    protected $primaryKey = 'oid';
    public $timestamps = false;
	
	public function item(){
		return $this->hasMany('App\Item','oid');	
	}
}

