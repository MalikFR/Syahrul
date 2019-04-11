<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alert;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    public $timestamps = true;

    public function produks()
    {
        return $this->hasMany('App\Produk', 'id_categories');
    }
    public static function boot()
    {
        parent::boot();


        self::deleting(function ($categories) {
            // mengecek apakah penulis masih punya buku
            if ($categories->produks->count() > 0) {
                // menyiapkan pesan error
                $html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ';
                $html .= '<ul>';
                foreach ($categories->produks as $produk) {
                    $html .= "<li>$produk->title</li>";
                }
                $html .= '</ul>';


                Alert::error('Karena Masih ada barang', 'Tidak Bisa Menghapus')->autoclose(5000);

                // membatalkan proses penghapusan
                return false;
            }
        });
}
}
