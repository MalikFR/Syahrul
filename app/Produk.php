<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\categories;
use App\orders;
class Produk extends Model
{
	use SoftDeletes;
	
	protected $table= 'produks';

	public function categories()
    {
        return $this->belongsTo('App\Category','id_categories');
    }


	public function orders(){

	return $this->belongsToMany('App\Order');
	}
	public function custom()
    {
    	return $this->hasMany('App\Custom','id_produks');
    }
}
