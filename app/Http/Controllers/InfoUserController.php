<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function userManagement(){
        $data['page_title'] = 'User Management';
        $data['user'] = User::where('role','Admin')->orderBy('id','desc')->get();
		return view('account-management/user-management',$data);
    }

    public function create()
    {
        $data['page_title'] = 'User Management';
        return view('account-management/user-profile',$data);
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'nik'     => ['required'],
            'jenis_kelamin' => ['max:70'],
        ]);
            $attribute = request()->validate([
                'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            ]);
        
        
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/img/foto_user/');
            $image->move($destinationPath, $name);

            User::where('id',Auth::user()->id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attribute['email'],
                'nik'     => $attributes['nik'],
                'jenis_kelamin' => $attributes['jenis_kelamin'],
                'foto'    => $name,
            ]); 
        }else{
            User::where('id',Auth::user()->id)
            ->update([
                'name'    => $attributes['name'],
                'email' => $attribute['email'],
                'nik'     => $attributes['nik'],
                'jenis_kelamin' => $attributes['jenis_kelamin'],
            ]); 
        }


        return redirect('/user-profile')->with('success','Profile updated successfully');
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
        // dd($request->all());
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
