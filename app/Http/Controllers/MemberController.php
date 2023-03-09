<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(){
        $data['product'] = Produk::all();
        $data['penjual'] = Penjual::all();
        $data['kat'] = Kategori::all();
        return view('index',$data);
    // return dd(auth()->user()->member);

    }
    public function explore(){
        return view('explore');
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
}
