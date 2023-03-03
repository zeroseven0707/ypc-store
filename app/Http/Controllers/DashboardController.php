<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
 public function index(){
    return view('admin.dashboard');
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
    'foto'=>$request->file('foto')->store('member.profile')
  ]);
  User::where('id',Auth::user()->id)->update([
    'username'=>$request->username
  ]);
   return redirect('/profile');
 }
}
