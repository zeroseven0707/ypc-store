<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Like;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(Request $request){
        if($request->tcari){
            $search = '%'.$request->tcari.'%';
            $data['penjual'] = Penjual::where('nama_toko','like',$search)->get();
            $data['kat'] = Kategori::where('nmkategori','like',$search)->get();
            $data['product'] = Produk::where('nmproduk','like',$search)->get();
        }else{
        $data['product'] = Produk::all();
        $data['penjual'] = Penjual::all();
        $data['kat'] = Kategori::all();
        }
        return view('index',$data);
    // return dd(auth()->user()->member);

    }
    public function edit($id){
        $data['profile'] = Member::where('id',$id)->first();
        return view('editmember',$data);
    }
    public function editmember($id, Request $request){
        $member = Member::where('id',$id)->first();
             Member::where('iduser',Auth::user()->id)->update([
            'no_induk'=>$request->no_induk,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'jk'=>$request->jk,
            'foto'=>$request->file('foto')->store('img/member')
          ]);
          User::where('id',$member->iduser)->update([
            'username'=>$request->username
          ]);
          return back()->with('message','berhasil update');
    }
    public function explore(Request $request){
        if($request->tcari){
            $search = '%'.$request->tcari.'%';
            $data['product'] = Produk::where('nmproduk','like',$search)->get();
        }else{
            $data['product'] = Produk::all();
        }
        return view('explore',$data);
    }
    public function aktif(Request $request, $id){
         Member::where('id',$id)->update([
            'status_aktif'=>'1'
         ]);
         return back();
    }
    public function destroy($id){
        $member = Member::find($id)->delete();
        Penjual::where('idmember',$member->id);
        User::where('id',$member->user->id);
        return back();
    }
    public function yourorder(Request $request){
        if($request->tcari){
            $cari = '%'.$request->tcari.'%';
        $data['belumbayar'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspembayaran','belum bayar')
        ->where('tipepembayaran','Transfer')
        ->where('tanggalpesanan','like',$cari)
        ->get();
        $data['dikirim'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspesanan','dikirim')
        ->where('tanggalpesanan','like',$cari)
        ->get();
        $data['dikemas'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspesanan','dikemas')
        ->where('tanggalpesanan','like',$cari)
        ->get();
        $data['selesai'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspesanan','diterima')
        ->where('tanggalpesanan','like',$cari)
        ->get();
        }else{
        $data['belumbayar'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspembayaran','belum bayar')
        ->where('tipepembayaran','transfer')
        ->get();
        $data['dikirim'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspesanan','dikirim')
        ->get();
        $data['dikemas'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspesanan','dikemas')
        ->get();
        $data['selesai'] = Pesanan::select("*", DB::raw('harga * jmlpesanan as total'))
        ->where('idmember',getId())
        ->where('statuspesanan','diterima')
        ->get();
    }
        $data['penjual'] = Penjual::all();
        return view('yourorder',$data);
    }
    public function cart(){
        // $data['cart'] = Pesanan::select("*", DB::raw('SUM(harga * jmlpesanan) as total, SUM(jmlpesanan) as jml'))->where('statuspesanan','tunda')
        // ->get();
        $data['cart'] = Pesanan::select("*", DB::raw('SUM(jmlpesanan) as jml'))->where('statuspesanan','tunda')->groupBy('kdproduk')
        ->get();
        return view('cart',$data);
    }
    public function terima($id){
        Pesanan::where('slug',$id)->update([
            'statuspesanan'=>'diterima'
        ]);
        return back()->with('message','pesanan diterima');
    }
}
