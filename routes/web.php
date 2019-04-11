<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('/', function () {
    return view('frontends.index');
});



Route::get('logout', function () {
    return view('/home');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::resource("users", "UserController");
    Route::get("users/delete", "UserController@delete");
    Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');
    Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
    Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
    Route::delete('/categories/{id}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
    Route::resource('categories', 'CategoryController');
    Route::get('/produks/trash', 'ProdukController@trash')->name('produks.trash');
    Route::post('/produks/{id}/restore', 'ProdukController@restore')->name('produks.restore');
    Route::delete(
        '/produks/{id}/delete-permanent',
        'ProdukController@deletePermanent'
    )->name('produks.delete-permanent');
    Route::resource('produks', 'ProdukController');
    Route::resource('orders', 'OrderController');
    Route::resource('checkouts', 'CheckoutController');
    Route::resource('carts', 'CartController');
    Route::resource('kategoriartikel', 'KategoriArtikelController');
    Route::resource('artikel', 'ArtikelController');
    Route::resource("users", "UserController");
});



//route frontend
Route::get('/about', function () {
    return view('frontends.about');
});
Route::get('/blog', 'FrontendController@artikels')->name('artikels');
Route::get('/blogdetails/{artikels}', 'FrontendController@single')->name('single');


Route::get('/checkout', function () {
    return view('frontends.checkout');
});
Route::get('/contact', function () {
    return view('frontends.contact');
});

Route::get('/detailproduk', function () {
    return view('frontends.detailproduk');
});
Route::get('/shop', function () {
    return view('frontends.shop');
});
Route::get('/thankyou', function () {
    return view('frontends.thankyou');
});
Route::get('/login-register', function () {
    return view('frontends.login-register');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/add-cart/{id_produks}', function ($id_produks) {
        // $produk = \App\Product::find($id_produks);
        $exist = \App\carts::where('id_users', \Auth::user()->id)->where('id_produks', $id_produks)->first();
        if ($exist) {
            $exist->jumlah_brg = $exist->jumlah_brg + 1;
            $exist->save();
        } else {
            $data = new \App\carts;
            $data->id_produks = $id_produks;
            $data->jumlah_brg = 1;
            $data->id_users = \Auth::user()->id;
            $data->save();
        }
        return redirect()->back();
    });

    Route::get('cart/{usr_id}', function ($usr_id) {
        $cart = \App\carts::where('id_users', $usr_id)->get();
        return view('frontends.cart', compact('cart'));
    });

    Route::get('cart/delete/{id}', function ($id) {
        $cart = \App\carts::find($id)->delete();
        return redirect()->back();
    });

    Route::post('cart/edit/{id_users}', function (\Illuminate\Http\Request $request, $id_users) {
        for ($i = 0; $i < count($request->id); $i++) {
            $cart = \App\carts::find($request->id[$i]);
            $cart->jumlah_brg = $request->jumlah_brg[$i];
            $cart->save();
        }

        return redirect()->back();
    });

    Route::post('checkout/{id_users}', function (\Illuminate\Http\Request $request, $id_users) {
        $request->validate([
            'alamat' => 'required|',
            'no_tlp' => 'required|',
            'pengiriman' => 'required|',
            'pembayaran' => 'required|',
        ]);
        // dd(json_decode($request->chart));
        foreach (json_decode($request->chart) as $data) {

            $custom = new \App\Custom;
            $custom->nama = \Auth::user()->name;
            $custom->alamat = $request->alamat;
            $custom->no_tlp = $request->no_tlp;
            $custom->pengiriman = $request->pengiriman;
            $custom->jumlah_brg = $data->jumlah_brg;
            $custom->pembayaran = $request->pembayaran;
            $custom->id_produks = $data->id_produks;
            $custom->id_users = \Auth::user()->id;

            $custom->save();
        }

        $del = \App\carts::where('id_users', $id_users)->delete();

        return redirect()->back();
    });
});
