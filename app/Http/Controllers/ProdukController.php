<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use App\Produk;
use File;
use App\Category;

class ProdukController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $status = $request->get('categories');
        $keyword = $request->get('keyword') ? $request->get('keyword') : '';
        if ($status) {
            $produks = Produk::with('categories')->where(
                'title',
                "LIKE",
                "%$keyword%"
            )->where('status', strtoupper($status))->paginate(10);
        } else {
            $produks = Produk::with('categories')->where(
                "title",
                "LIKE",
                "%$keyword%"
            )->paginate(10);
        }
        $filterKeyword = $request->get('title');

        if ($filterKeyword) {
            $produks = \App\Produk::where("title", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        return view('produks.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();
        $categories = Category::all();
        return view('produks.create', compact('produk', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(), [
            "title" => "required|unique:produks|min:0|max:200",
            "description" => "required|min:0|max:1000",
            "price" => "required|digits_between:0,20",
            "stock" => "required|digits_between:0,20",
            "cover" => "required|image|mimes:jpg,png,svg,ico,jpng,jpeg",
            'id_categories' => 'required',
        ])->validate();
        $produks = new \App\Produk;
        $produks->title = $request->get('title');
        $produks->description = $request->get('description');
        $produks->id_categories = $request->get('id_categories');
        $produks->price = $request->get('price');
        $produks->stock = $request->get('stock');
        $produks->status = $request->get('save_action');
        $produks->slug = str_slug($request->get('title'));
        $produks->created_by = \Auth::user()->id;
        $cover = $request->file('cover');
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $destinationPath = public_path() . '/assets/img/barang/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $produks->cover = $filename;
        }
        $produks->save();
        if ($request->get('save_action') == 'PUBLISH') {
            return redirect()
                ->route('produks.index')
                ->with('status', 'Produk Berhasil ditambahkan!');
        } else {
            return redirect()->route('produks.index')
                ->with('status', 'Barang
        Berhasil DiTambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produks = Produk::findOrFail($id);
        $categories = Category::all();
        $selectedkategori = Produk::findOrFail($produks->id)->id_categories;
        return view('produks.edit', compact('produks', 'categories', 'selectedkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            "title" => "required|min:0|max:200",
            "description" => "required|min:0|max:1000",
            "price" => "required|digits_between:0,10",
            "stock" => "required|digits_between:0,10",
            "cover" => "image|mimes:jpg,png,svg,ico,jpng,jpeg",
            'id_categories' => 'required',
        ])->validate();

        $produks = \App\Produk::findOrFail($id);

        $produks->title = $request->get('title');
        $produks->slug = $request->get('slug');
        $produks->description = $request->get('description');
        $produks->id_categories = $request->get('id_categories');
        $produks->stock = $request->get('stock');
        $produks->price = $request->get('price');

        if ($request->file('cover')) {
            $file = $request->file('cover');
            $destinationPath = public_path() . '/assets/img/barang/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            if ($produks->cover) {
                $old_cover = $produks->cover;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/barang'
                    . DIRECTORY_SEPARATOR . $produks->cover;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $produks->cover = $filename;
        }
        $produks->updated_by = \Auth::user()->id;

        $produks->status = $request->get('status');

        $produks->save();


        return redirect()->route('produks.index', ['id' => $produks->id])->with('status', 'Barang
        Berhasil DiUbah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produks = \App\Produk::findOrFail($id);
        $produks->delete();

        return redirect()->route('produks.index')->with('status', 'Barang
        Berhasil Dihapus!');;
    }

    public function trash()
    {
        $produks = \App\Produk::onlyTrashed()->paginate(10);
        return view('produks.trash', ['produks' => $produks]);
    }

    public function restore($id)
    {
        $produks = \App\Produk::withTrashed()->findOrFail($id);
        if ($produk->trashed()) {
            $produks->restore();
            return redirect()->route('produks.trash')->with('status', 'produk successfully restored');
        } else {
            return redirect()->route('produks.trash')->with('status', 'produk is not in
    trash');
        }
    }
}
