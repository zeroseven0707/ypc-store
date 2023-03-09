<?php

namespace App\Http\Controllers;

use App\Models\GambarToko;
use App\Models\Member;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('daftarpenjual');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['member'] = Member::where('iduser','=',Auth::user()->id)->first();
        $id = $data['member']['id'];
        $data = Penjual::create([
            'nama_toko'=>$request->nama_toko,
            'deskripsi_toko'=>$request->deskripsi_toko,
            'idmember'=>$id
        ]);
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:png,jpg,jpeg,webp'
            ]);
     
     
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {
                    $store = $file->store('img/toko');
                    $insert[$key]['nama_gambar'] = $store;
                    $insert[$key]['id_toko'] = $data->id;
     
                }
             }
     
            GambarToko::insert($insert);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
