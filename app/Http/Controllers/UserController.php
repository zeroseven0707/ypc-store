<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(Request $request){
        if ($request->username == '') {
            return back()->with('message','username harus diisi');
        }if ($request->password == '') {
            return back()->with('message','Password harus diisi');
        }
        $data = User::create([
                'username'=>$request->username,
                'password'=>bcrypt($request->password)
            ]);
                Member::create([
                    'iduser'=>$data['id']
                ]);
        return redirect('/login')->with('success','berhasil daftar');
    }

}
