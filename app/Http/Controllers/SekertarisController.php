<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SekertarisController extends Controller
{
    public function index(){
        $data['page_title'] = 'Daftar Sekertaris';
        if (Auth::user()->role == 'Agensi') {
            if (Auth::user()->referal_base != null) {
                $data['user'] = User::where('role','Sekertaris')->where('referal_code',Auth::user()->referal_base)->orderBy('id','desc')->get();
            }else{
                return Redirect('user-profile#referal')->with('need_referal','Mohon Generate Code Referal anda terlebih dahulu!');
            }
        }else{
            $data['user'] = User::where('role','Sekertaris')->orderBy('id','desc')->get();
        }
		return view('sekertaris/sekertaris',$data);
    }

    public function detail($id)
    {
        $data['sekertaris'] = User::find($id);
        $data['page_title'] = 'Detail '.$data['sekertaris']->name;
        return view('sekertaris/detail-sekertaris',$data);
    }
}
