<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $table = 'customs';
    protected $fillable = ['nama', 'alamat', 'no_tlp', 'pengiriman', 'jumlah_brg', 'pembayaran', 'id_produks', 'id_users'];
    public $timestamps = true;

    public function produks()
    {
        return $this->belongsTo('App\Produk', 'id_produks');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_users');
    }
}
