<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penjual;
use App\Models\Pesanan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function create(Request $request, $id){
        $produk = Produk::where('id',$id)->first();
        
        if ($request->save == 'buynow') {
            $stspesanan = 'dikemas';
        }elseif($request->save == 'addtocart'){
            $stspesanan = 'tunda';
        }
        
            $pesanans = Pesanan::orderBy('id', 'desc')->first();
            if ($pesanans == NULL) {
                $maxValue = 1;
            }else{  
                $maxValue = $pesanans->id;
            }
            $maxValue++;
            $huruf = "INV/".Carbon::now()->format('d-m-y')."/";
            $kodeinv = $huruf . sprintf("%04s", $maxValue);
            $produk = Produk::where('id',$id)->first();
            if ($request->jumlah < 1 ) {
                return back()->with('error','isi jumlah produk dengan benar');
            }elseif($request->jumlah > $produk->stok){
                return back()->with('error','stok kurang dari jumlah yang akan dibeli');
            }
            $pesanan['pesanan'] = Pesanan::create([
                'tanggalpesanan'=>Carbon::now()->format('y-m-d'),
                'kode_inv'=>$kodeinv,
                'slug'=>Str::random(20),
                'kdproduk'=>$id,
                'jmlpesanan'=>$request->jumlah,
                'harga'=>$produk->harga,
                'statuspembayaran'=>'belum bayar',
                'statuspesanan'=>$stspesanan,
                'idmember'=>getId()
            ]);
             
        if ($request->save == 'buynow') {
            return view('detailpesanan',$pesanan);

        }elseif($request->save == 'addtocart'){
            return back()->with('message','ditambahkan ke keranjang');
        }
           
        }
        public function checkout(Request $request,$id){
            if ($request->metodepembayaran == '') {
                return back()->with('message','Metode Pembayaran Harus Diisi');
            }
            if($request->metodepembayaran == 'cod'){
                Pesanan::where('id',$id)->update([
                    'tipepembayaran'=>$request->metodepembayaran
                ]);
                return redirect('/');
            }elseif ($request->metodepembayaran == 'transfer') {
                $data['id'] = $id;
                Pesanan::where('id',$id)->update([
                    'tipepembayaran'=>$request->metodepembayaran
                ]);
                return view('bukti',$data);
            }
        }
        public function bukti(Request $request, $id){
            Pesanan::where('id',$id)->update([
                'buktipembayaran'=>$request->file('file')->store('img/bukti')
                
            ]);
            return redirect('/')->with('message','pesanan berhasil dibuat');
        }
        public function hapus($id){
            Pesanan::where('id',$id)->delete();
            return redirect('/');
        }
        public function view(){
            $data['pesanan'] = Pesanan::where('idpenjual',getIdpenjual())->join('produks','pesanans.kdproduk','=','produks.id')->join('penjuals','produks.idpenjual','=','penjuals.id')->where('statuspesanan','dikemas')->get();
            $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
            return view('admin.pesanan',$data);
        }
        public function dikirim($id){
            Pesanan::where('slug',$id)->update([
                'statuspembayaran'=>'bayar',
                'statuspesanan'=>'dikirim',
            ]);
            return back();
        }
        public function inv($id){
            $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
            $data['inv'] = Pesanan::where('slug',$id)->first();
            return view('generateinv',$data);
        }
        public function category($id){
            $data['category'] = Kategori::where('id',$id)->get();
            return view('detailcategory',$data);
        }
        public function checkoutcart($id, Request $request){
            $pesanans = Pesanan::orderBy('id','desc')->first();
            if ($pesanans == NULL) {
                $maxValue = 1;
            }else{  
                $maxValue = $pesanans->id;
            }
            $maxValue++;
            $huruf = "INV/".Carbon::now()->format('d-m-y')."/";
            $kodeinv = $huruf . sprintf("%04s", $maxValue);
            $pesanan = Pesanan::where('id',$id)->first();
            if ($request->jumlah < 1 ) {
                return back()->with('error','isi jumlah produk dengan benar');
            }elseif($request->jumlah > $pesanan->produk->stok){
                return back()->with('error','stok kurang dari jumlah yang akan dibeli');
            }
            $pesanan['pesanan'] = Pesanan::where('id',$id)->update([
                'tanggalpesanan'=>Carbon::now()->format('y-m-d'),
                'jmlpesanan'=>$request->jumlah,
                'statuspesanan'=>'dikemas',
            ]);
            $data['pesanan'] = Pesanan::where('id',$id)->first();
            return view('detailpesanan',$data);
        }
    }