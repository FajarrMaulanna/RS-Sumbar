<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        $data_rs = \App\rs::all();
        return view('admin.index',['data_rs' => $data_rs]);
    }

    public function kebutuhan(Request $request)
    {
        $data_kebutuhan = \App\kebutuhan::all();
        return view('admin.kebutuhan',['data_kebutuhan' => $data_kebutuhan]);
    }

    public function create1(Request $request)
    {    
        \App\kebutuhan::create($request->all());
        return redirect('/kebutuhan-admin');
    }

    public function donatur(Request $request)
    {
        $data_donatur = \App\donatur::all();
        return view('admin.donatur',['data_donatur' => $data_donatur]);
    }

    public function create2(Request $request)
    {    
        \App\donatur::create($request->all());
        return redirect('/donatur-admin');
    }

    public function penyedia(Request $request)
    {
        $data_penyedia = \App\penyedia::all();
        return view('admin.penyedia',['data_penyedia' => $data_penyedia]);
    }

    public function create3(Request $request)
    {    
        \App\penyedia::create($request->all());
        return redirect('/penyedia-admin');
    }
}