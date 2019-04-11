<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;
use App\Category;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = \App\Category::paginate(10);

        $filterKeyword = $request->get('name');

        if ($filterKeyword) {
            $categories = \App\Category::where("name", "LIKE", "%$filterKeyword%")->paginate(10);
        }

        return view('categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            "name" => "required|unique:categories|min:0|max:20",
            "image" => "required|image|mimes:jpg,png,svg,ico,jpng,jpeg"
        ])->validate();

        $name = $request->get('name');

        $new_category = new \App\Category;
        $new_category->name = $request->get('name');

        if ($request->file('image')) {
            $file = $request->file('image');
            $destinationPath = public_path() . '/assets/img/barang/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);
            $new_category->image = $filename;
        }

        $new_category->created_by = \Auth::user()->id;

        $new_category->slug = str_slug($name, '-');

        $new_category->save();

        return redirect()->route('categories.index')->with('status', 'Kategori
        Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = \App\Category::findOrFail($id);

        return view('categories.show', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_to_edit = \App\Category::findOrFail($id);

        return view('categories.edit', ['category' => $category_to_edit]);
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
            "name" => "required|min:0|max:20",
            "image" => "required|image|mimes:jpg,png,svg,ico,jpng,jpeg",
            "slug" => ""
        ]);

        $name = $request->get('name');
        $slug = $request->get('slug');

        $categories = \App\Category::findOrFail($id);

        $categories->name = $name;
        $categories->slug = $slug;

        if ($request->file('image')) {
            $file = $request->file('image');
            $destinationPath = public_path() . '/assets/img/barang/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $filename);

            if ($categories->image) {
                $old_image = $categories->image;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/img/barang'
                    . DIRECTORY_SEPARATOR . $categories->image;
                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus/tidak ada
                }
            }
            $categories->image = $filename;
        }

        $categories->updated_by = \Auth::user()->id;

        $categories->slug = str_slug($name);

        $categories->save();

        return redirect()->route('categories.index', ['id' => $id])->with('status', 'Kategori
        Berhasil DiUbah!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = \App\Category::findOrFail($id);

        $categories->delete();

        return redirect()->route('categories.index');
    }



    public function ajaxSearch(Request $request)
    {
        $keyword = $request->get('q');

        $categories = \App\Category::where("name", "LIKE", "%$keyword%")->get();

        return $categories;
    }
}
