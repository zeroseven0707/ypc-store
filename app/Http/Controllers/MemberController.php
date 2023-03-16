<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(Request $request){
        $data['product'] = Produk::all();
        $data['penjual'] = Penjual::all();
        $data['kat'] = Kategori::all();
        return view('index',$data);
    // return dd(auth()->user()->member);

    }
    public function explore(){
        $data['product'] = Produk::all();
        return view('explore',$data);
    }
    public function aktif(Request $request, $id){
         Member::where('id',$id)->update([
            'status_aktif'=>'1'
         ]);
         return back();
    }
    public function destroy($id){
        Member::find($id)->delete();
        return back();
    }
    public function yourorder(){
        $data['yourorder'] = Pesanan::all();
        $data['yourorder'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->groupBy("id")
        ->get();
        $data['penjual'] = Penjual::all();
        return view('yourorder',$data);
    }
    public function cart(){
        $data['cart'] = Pesanan::select("*", DB::raw('SUM(harga * jmlpesanan) as total, SUM(jmlpesanan) as jml'))
        ->get();
        return view('cart',$data);
    }
}
