<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SantriController extends Controller
{
    public function userManagement(){
        $data['page_title'] = 'Santri Management';
        $data['user'] = User::where('role','Santri')->orderBy('id','desc')->get();
		return view('account-management/santri-management',$data);
    }

    public function tambahUser(Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'role' => ['required'],
            'nik' => ['required'],
            'jenis_kelamin' => ['required'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        $user = User::create($attributes);

        if ($user) {
            return redirect()->back()->with('success','Data has been created');
        }else{
            return redirect()->back()->with('failed','Data Failed created');
        }
    }

    public function updateUser(Request $request,$id)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'nik' => ['required'],
            'jenis_kelamin' => ['required'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($id)],
            'password' => ['nullable', 'min:5', 'max:20'],
            'agreement' => ['accepted']
        ]);
        if ($attributes['password'] != null) {
            $attributes['password'] = bcrypt($attributes['password'] );
            $user = User::where('id',$id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attributes['email'],
                'nik' => $attributes['nik'],
                'jenis_kelamin' => $attributes['jenis_kelamin'],
                'password' => $attributes['password'],
            ]); 
        }else{
            $user = User::where('id',$id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attributes['email'],
                'nik' => $attributes['nik'],
                'jenis_kelamin' => $attributes['jenis_kelamin'],
            ]); 
        }

        if ($user) {
            return redirect()->back()->with('success','Data has been edited');
        }else{
            return redirect()->back()->with('failed','Data Failed edited');
        }
    }

    public function deleteUser($id){
        $user = User::find($id);
        if ($user->delete()) {
            return redirect()->back()->with('success','Data has been deleted');
        }else{
            return redirect()->back()->with('failed','Data Failed deleted');
        }
    }
}
