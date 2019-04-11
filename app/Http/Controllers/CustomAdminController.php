<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Custom_order;
use App\Produk;
use Illuminate\Http\Request;
use App\Role;
use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CustomAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            $customa = Custom::all();
            return view('customadmin.index', compact('customa'));
        } elseif ($user = Auth::user()) {
            $customa = Custom::where('id_users', Auth::user()->id)->get();
            return view('customadmin.index', compact('customa'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function show(Custom $customa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Custom  $customa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customa = Custom::findOrFail($id);
        $customa->delete();
        return redirect()->route('customadmin.index');
    }
}
