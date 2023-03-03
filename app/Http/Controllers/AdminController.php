<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function member(){
        $data['member'] = Member::all();
        return view('admin.member',$data);
    }
    public function product(){
        $data['product'] = Produk::all();
        return view('admin.product',$data);
    }
    public function category(){
        $data['kategori'] = Kategori::all();
        return view('admin.category',$data);
    }
}
