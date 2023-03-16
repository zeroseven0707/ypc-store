<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Pesanan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function create(Request $request, $id){
        $produk = Produk::where('id',$id)->first();
        
        if ($request->save == 'buynow') {
            $stspesanan = 'dikemas';
        }else{
            $stspesanan = 'ditunda';
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
            $pesanan['pesanan'] = Pesanan::create([
                'tanggalpesanan'=>Carbon::now()->format('d-m-y'),
                'kode_inv'=>$kodeinv,
                'kdproduk'=>$id,
                'jmlpesanan'=>$request->jumlah,
                'harga'=>$produk->harga,
                'statuspembayaran'=>'belum bayar',
                'statuspesanan'=>$stspesanan,
                'idmember'=>getId()
            ]);
            return view('detailpesanan',$pesanan);
        }
        public function checkout(Request $request,$id){
            Pesanan::where('id',$id)->update([
                'tipepembayaran'=>$request->metodepembayaran
            ]);
            return redirect('/');
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
    }