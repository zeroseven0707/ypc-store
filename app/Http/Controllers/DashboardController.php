<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Member;
use App\Models\Penjual;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
 public function index(){
  $data['member'] = Member::where('status_aktif','0')->get();
  $data['penjual'] = Penjual::where('status_aktivasi','0')->get();
    return view('admin.dashboard')->with($data);
 }

 public function profile(){
  $data['profile'] = Member::where('iduser',Auth::user()->id)->first();
   return view('member.profile',$data);
 }
public function edit(){
  $data['profile'] = Member::where('iduser',Auth::user()->id)->first();
  return view('member.edit',$data);
}
 public function update(Request $request){
  
     Member::where('iduser',Auth::user()->id)->update([
    'no_induk'=>$request->no_induk,
    'nama'=>$request->nama,
    'alamat'=>$request->alamat,
    'no_hp'=>$request->no_hp,
    'jk'=>$request->jk,
    'foto'=>$request->file('foto')->store('img/member')
  ]);
  User::where('id',Auth::user()->id)->update([
    'username'=>$request->username
  ]);
   return redirect('/profile');
 }
}
