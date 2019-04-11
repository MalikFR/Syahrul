<?php

namespace App;

use Alert;
use Illuminate\Database\Eloquent\Model;

class kategoriartikels extends Model
{
    protected $table='kategoriartikels';

    protected $fillable=['nama_kategori'];

    public $timestamps= true;

    public function artikels()
    {
        return $this->hasMany('App\artikels','id_kategoriartikels');
    }
    public static function boot()
    {
        parent::boot();


        self::deleting(function ($kategoriartikels) {
            // mengecek apakah penulis masih punya buku
            if ($kategoriartikels->artikels->count() > 0) {
                // menyiapkan pesan error
                $html = 'Penulis tidak bisa dihapus karena masih memiliki buku : ';
                $html .= '<ul>';
                foreach ($kategoriartikels->artikels as $artikel) {
                    $html .= "<li>$artikel->judul</li>";
                }
                $html .= '</ul>';


                Alert::error('Karena Masih ada Artikel', 'Tidak Bisa Menghapus')->autoclose(5000);

                // membatalkan proses penghapusan
                return false;
            }
        });
}


}
