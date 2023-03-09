<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\Penjual;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['kat'] = Kategori::all();
        $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
        return view('addproduct',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            Produk::create([
            'nmproduk' => $request->nmproduk,
            'deskripsi' => $request->deskripsi,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'idkategori' => $request->idkategori,
            'idpenjual' => getIdpenjual(),
        ]);

        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:png,jpg,jpeg,webp'
            ]);
     
     
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {
                    $data = Produk::latest()->first();
                    $store = $file->store('img/produk');
                    $insert[$key]['nama_gambar'] = $store;
                    $insert[$key]['kdproduk'] = $data->id;
     
                }
             }
     
            Gambar::insert($insert);
            return redirect('/product/add');
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
    public function edit($id)
    {
        $data['kat'] = Kategori::all();
        $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
        $data['product'] = Produk::where('id',$id)->first();
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Produk::where('id',$id)->update([
            'nmproduk'=>$request->nmproduk,
            'deskripsi'=>$request->deskripsi,
            'stok'=>$request->stok,
            'harga'=>$request->harga,
            'idkategori'=>$request->idkategori,
        ]);
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'mimes:png,jpg,jpeg,webp'
            ]);
     
     
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {
                    $data = Produk::latest()->first();
                    $store = $file->store('img/produk');
                    $insert[$key]['nama_gambar'] = $store;
                    $insert[$key]['kdproduk'] = $id;
     
                }
             }
     
            Gambar::insert($insert);
        return back();
    }
    public function detail($id){
        $data['product'] = Produk::where('id',$id)->first();
        return view('detailproduct',$data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produk::where('id',$id)->delete();
        Gambar::where('kdproduk',$id)->delete();
        return back();
    }
    public  function destroy_img($id){
        Gambar::where('id',$id)->delete();
        return back();  
    }
}
