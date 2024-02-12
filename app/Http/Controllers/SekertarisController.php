<?php

namespace App\Http\Controllers;

use App\Models\LogAction;
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

    public function updateStatus(Request $request, $id)
    {
        try {
            $new = User::find($id);
            if ($new->status != $request->status) {
                if ($request->status == 1) {
                    $log = new LogAction();
                    $log->id_user =  Auth::user()->id;
                    $log->event = Auth::user()->name. ' Mengaktifkan '.$new->role.' : '.$new->email;
                    $log->save();
                }else{
                    $new->reason_non_aktif = $request->reason_non_aktif;
                    $log = new LogAction();
                    $log->id_user =  Auth::user()->id;
                    $log->event = Auth::user()->name. ' Menonaktifkan Sekertaris : '.$new->email. ', Catatan : ' .$new->reason_non_aktif;
                    $log->save();
                }
            }
            $new->status = $request->status;
            if ($new->save()) {
                return redirect()->back()->with('success','Status Akun berhasil diubah!');
            }else{
                return redirect()->back()->with('success','Status Akun gagal diubah!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Developer!');
        }

    }

}
