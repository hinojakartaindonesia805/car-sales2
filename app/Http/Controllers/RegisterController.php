<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store(Request $request)
    {
        // dd($request->all());
       
        try {
            $new = new User();
            $new->name = $request->name;
            $new->role = $request->role;
            $new->bisnis_tipe = $request->tipe_bisnis;
            $new->jenis_kelamin = $request->jenis_kelamin;
            $new->age = $request->age;
            $new->email = $request->email;
            $new->referal_code = $request->referal_code;
            $new->password = bcrypt($request->password);
    
            if ($new->save()) {
                return redirect()->back()->with('success','Berhasil Register!');
            }else{
                return redirect()->back()->with('failed','Gagal Register!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Gagal Register,Mohon hubungi Developer!');
        }
    }
}
