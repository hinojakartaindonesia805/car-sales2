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
       
        try {
            $attributes = request()->validate([
                'name' => ['required', 'max:50'],
                'role' => ['required'],
                'nik' => ['required'],
                'jenis_kelamin' => ['required'],
                'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
                'password' => ['required', 'min:5', 'max:20'],
            ]);
            
            $attributes['password'] = bcrypt($attributes['password'] );
            User::create($attributes);  

            return redirect()->back()->with('success','Berhasil Register!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Gagal Register');
        }
    }
}
