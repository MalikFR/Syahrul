<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Produk;
use App\User;

class carts extends Model
{
    protected $table='carts';

    protected $fillable=['id_produks','id_users','jumlah_brg'];

    public $timestamps= true;

    public function produks()
    {
        return $this->belongsTo('App\Produk','id_produks');
    }

    public function users()
    {
        return $this->belongsTo('App\User','id_users');
    }

}
