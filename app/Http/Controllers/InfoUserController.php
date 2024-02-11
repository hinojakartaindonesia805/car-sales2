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
        $data['page_title'] = 'Profile '.Auth::user()->name;
        return view('account-management/user-profile',$data);
    }

    public function store(Request $request)
    {

        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore(Auth::user()->id)],
            'jenis_kelamin' => ['nullable','max:70'],
            'bisnis_tipe' => ['nullable'],
            'linkedin' => ['nullable'],
            'vidio_diri' => ['nullable'],
            'tentang_diri' => ['nullable'],
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
                'name'    => $request->name,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'bisnis_tipe' => $request->bisnis_tipe,
                'vidio_diri' => $request->vidio_diri,
                'linkedin' => $request->linkedin,
                'tentang_diri' => $request->tentang_diri,
                'foto'    => $name,
            ]); 
        }else{
            User::where('id',Auth::user()->id)
            ->update([
                'name'    => $request->name,
                'email' => $request->email,
                'jenis_kelamin' => $request->jenis_kelamin,
                'bisnis_tipe' => $request->bisnis_tipe,
                'vidio_diri' => $request->vidio_diri,
                'linkedin' => $request->linkedin,
                'tentang_diri' => $request->tentang_diri,
            ]); 
        }


        return redirect('/user-profile')->with('success','Data Profile Berhasil Diedit!');
    }

    public function tambahUser(Request $request)
    {
        try {
            $new = new User();
            $new->name = $request->name;
            $new->role = $request->role;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/foto_user/');
                $image->move($destinationPath, $name);
                $new->foto = $name;
            }
            $new->jenis_kelamin = $request->jenis_kelamin;
            $new->email = $request->email;
            $new->password = bcrypt($request->password);
    
            if ($new->save()) {
                return redirect()->back()->with('success','Data Admin Berhasil Dibuat!');
            }else{
                return redirect()->back()->with('failed','Data Admin Gagal Dibuat!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Admin!');
        }

    }
    public function updateUser(Request $request,$id)
    {
      
        try {
            $new = User::find($id);
            $new->name = $request->name;
            $new->role = $request->role;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/foto_user/');
                $image->move($destinationPath, $name);
                $new->foto = $name;
            }
            $new->jenis_kelamin = $request->jenis_kelamin;
            $new->email = $request->email;
            if ($request->password != null) {
                $new->password = bcrypt($request->password);
            }
            if ($new->save()) {
                return redirect()->back()->with('success','Data Admin Berhasil Diedit!');
            }else{
                return redirect()->back()->with('failed','Data Admin Gagal Diedit!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Admin!');
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
