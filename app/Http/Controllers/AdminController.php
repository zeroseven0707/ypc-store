<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function member(){
        $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
        $data['member'] = Member::all();
        return view('admin.member',$data);
    }
    public function product(){
        if (Auth::check() && Auth::user()->level == 'member') {
            $data['productPenjual'] = Produk::where('idpenjual',getIdPenjual())->get();
        }elseif (Auth::check() && Auth::user()->level == 'admin') {
            $data['product'] = Produk::all();
        }
        $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
        return view('admin.product',$data);
    }
    public function category(){
        $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
        $data['kategori'] = Kategori::all();
        // $data['kategori'] = User::all();
        return view('admin.category',$data);
    }
    public function store(Request $request){
    }
    public function add(){
  $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
        return view('addproduct',$data);
    }
}
