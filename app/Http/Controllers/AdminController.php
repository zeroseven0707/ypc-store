<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Kategori;
use App\Models\Like;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function favorite(){
        $data['like'] = Like::where('idmember',Auth::user()->member->id)->get();
        return view('favorite',$data);
    }
    public function hapusfavorite($id){
        Like::find($id)->delete();
        return back()->with('error','Dislike');
    }
    public function like($id){
        $like = Like::where('kdproduk',$id)->where('idmember',Auth::user()->member->id)->count();
        if ($like == 1) {
            return back()->with('error','Anda sudah Menambahakan produk ini ke favorite sebelum nya');
        }else{

            Like::create([
                'kdproduk'=>$id,
                'idmember'=>Auth::user()->member->id
        ]);
    }
        return back()->with('message','Produk Ditambahkan Ke Favorite');
    }
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
    public function sellerrequest(){
  $data['penjual'] = Penjual::all();
  $data['seller'] = Penjual::all();
        return view('sellerrequest',$data);
    }
    public function memberrequest(){
  $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
  $data['member'] = Member::all();
        return view('memberrequest',$data   );
    }
    public function generateexcel(){
        return Excel::download(new LaporanExport,'Laporan.xlsx');
    }
    public function laporan(Request $request){
  $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
  $search = '%'.$request->tcari.'%';
  if ($request->tcari) {
    $data['pesanan'] = Pesanan::where('tanggalpesanan','like',$search)->get();
  }else{
      $data['pesanan'] = Pesanan::all();
  }
        return view('laporan',$data);
    }
    public function sellerrequestedit($id){
        Penjual::where('id',$id)->update([
            'status_aktivasi'=>'1'
        ]);
        return back()->with('message','berhasil meng aktifkan Toko');
    }
    public function nonaktiftoko($id){
        Penjual::where('id',$id)->update([
            'status_aktivasi'=>'0'
        ]);
        return back()->with('message','berhasil menonaktifkan Toko');
    }
    public function nonaktifmember($id){
        Member::where('id',$id)->update([
            'status_aktif'=>'0'
        ]);
        return back()->with('message','berhasil menonaktifkan Penjual');
    }
}
