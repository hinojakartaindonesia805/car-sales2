<?php

namespace App\Http\Controllers;

use App\Models\LogAction;
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
    public function registerSekertaris()
    {
        return view('session.register-sekertaris');
    }
    public function registerCustomer()
    {
        return view('session.register-customer');
    }

    public function store(Request $request)
    {
        // dd($request->all());
       
        try {
            $new = new User();
            $new->name = $request->name;
            $new->role = $request->role;
            $new->no_wa = $request->no_wa;
            $cekMail = User::where('email',$request->email)->first();
            if ($cekMail != null) {
                return redirect()->back()->with('failed','Email sudah dipakai!');
            }
            $new->email = $request->email;
            $new->status = 1;
            $new->referal_code = $request->referal_code;
            if ($request->password != $request->confirm_password) {
                return redirect()->back()->with('failed','Confirm Password not match!');
            }
            $new->password = bcrypt($request->password);
    
            if ($new->save()) {

                $log = new LogAction();
                $log->id_user =  $new->id;
                $log->event = $new->email. 'Telah Mendaftar sebagai '. $new->role;
                $log->save();
        
                return redirect()->back()->with('success','Berhasil Register!');
            }else{
                return redirect()->back()->with('failed','Gagal Register!');
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('failed','Gagal Register,Mohon hubungi Developer!');
        }
    }
}
