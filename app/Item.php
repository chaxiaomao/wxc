<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
		'iid',
        'oid',
        'goods_name',
        'gid',
        'num',
        'price'
    ];
	
	//protected $table = 'items';
    protected $primaryKey = 'iid';
    public $timestamps = false;
	
	public function order(){
		return $this->belongsTo('App\Order');
	}
}
