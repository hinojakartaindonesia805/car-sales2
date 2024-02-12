<?php

namespace App\Http\Controllers;

use App\Models\LogAction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AgensiController extends Controller
{
    public function index(){
        $data['page_title'] = 'Agensi Management';
        $data['user'] = User::where('role','Agensi')->orderBy('id','desc')->get();
		return view('agensi/agensi',$data);
    }

    public function store(Request $request)
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
            $new->bisnis_tipe = $request->tipe_bisnis;
            $cekMail = User::where('email',$request->email)->first();
            if ($cekMail != null) {
                return redirect()->back()->with('failed','Email sudah dipakai!');
            }
            $new->email = $request->email;
            $new->password = bcrypt($request->password);
            $new->status = $request->status;
            $new->reason_non_aktif = $request->reason_non_aktif;
    
            if ($new->save()) {

                $log = new LogAction();
                $log->id_user =  Auth::user()->id;
                $log->event = Auth::user()->name. ' Membuat Agensi Baru : '.$new->email;
                $log->save();

                return redirect()->back()->with('success','Data Agensi Berhasil Dibuat!');
            }else{
                return redirect()->back()->with('failed','Data Agensi Gagal Dibuat!');
            }
        } catch (\Throwable $th) {
            // return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Developer!');
            return redirect()->back()->with('failed',$th->getMessage());
        }

    }
    public function update(Request $request,$id)
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
            $new->bisnis_tipe = $request->tipe_bisnis;
            $cekMail = User::where('id','!=',$id)->where('email',$request->email)->first();
            // dd($cekMail);
            if ($cekMail != null) {
                return redirect()->back()->with('failed','Email sudah dipakai!');
            }
            $new->email = $request->email;
            if ($new->status != $request->status) {
                if ($request->status == 1) {
                    $log = new LogAction();
                    $log->id_user =  Auth::user()->id;
                    $log->event = Auth::user()->name. ' Mengaktifkan Agensi : '.$new->email;
                    $log->save();
                }else{
                    $new->reason_non_aktif = $request->reason_non_aktif;
                    $log = new LogAction();
                    $log->id_user =  Auth::user()->id;
                    $log->event = Auth::user()->name. ' Menonaktifkan Agensi : '.$new->email. ', Catatan : ' .$new->reason_non_aktif;
                    $log->save();
                }
            }
            $new->status = $request->status;
            if ($request->password != null) {
                $new->password = bcrypt($request->password);
            }
    
            if ($new->save()) {

                $log = new LogAction();
                $log->id_user =  Auth::user()->id;
                $log->event = Auth::user()->name. ' Mengedit Agensi : '.$new->email;
                $log->save();

                return redirect()->back()->with('success','Data Agensi Berhasil Diedit!');
            }else{
                return redirect()->back()->with('failed','Data Agensi Gagal Diedit!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Developer!');
        }

    }
    public function referalUpdate(Request $request,$id)
    {
        try {
            $new = User::find($id);
            if (Auth::user()->role == 'Agensi') {
                $new->referal_base = $request->code_referal;
            }elseif (Auth::user()->role == 'Sekertaris') {
                $new->referal_code = $request->code_referal;
            }
            if ($new->save()) {


                return redirect()->back()->with('success','Code Referal Berhasil disimpan!');
            }else{
                return redirect()->back()->with('failed','Code Referal Gagal disimpan!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Developer!');
        }

    }
 
    public function cekReferal(Request $request){
        try {
            $cek = User::where('role','Agensi')->where('referal_base',$request->referal_base)->first();
            return response()->json([
                'msg' => 'berhasil',
                'data' => $cek ?? '',
                'result' => $cek != null ? 'Ada' : 'Tidak Ada'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'msg' => 'gagal',
                'result' => 'Terjadi Problem,mohon hubungi Developer!'
            ]);
        }
    }
    public function destroy(Request $request,$id)
    {
        try {
            $new = User::find($id);
           
            $log = new LogAction();
            $log->id_user =  Auth::user()->id;
            $log->event = Auth::user()->name. ' Menghapus Agensi : '.$new->email;
            $log->save();

            if ($new->delete()) {
                return redirect()->back()->with('success','Data Agensi Berhasil Dihapus!');
            }else{
                return redirect()->back()->with('failed','Data Agensi Gagal Dihapus!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Terjadi Problem,mohon hubungi Developer!');
        }

    }
}
