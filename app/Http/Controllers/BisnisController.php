<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\LogAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BisnisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Bisnis Management';
        $data['bisnis'] = Bisnis::orderBy('tipe_bisnis','asc')->get();
		return view('bisnis/bisnis',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   
     public function store(Request $request)
     {
         try {
             $new = new Bisnis();
             $new->tipe_bisnis = $request->tipe_bisnis;
     
             if ($new->save()) {
 
                 $log = new LogAction();
                 $log->id_user =  Auth::user()->id;
                 $log->event = Auth::user()->name. ' Membuat Tipe Bisnis Baru : '.$new->tipe_bisnis;
                 $log->save();
 
                 return redirect()->back()->with('success','Data Tipe Bisnis Berhasil Dibuat!');
             }else{
                 return redirect()->back()->with('failed','Data Tipe Bisnis Gagal Dibuat!');
             }
         } catch (\Throwable $th) {
             return redirect()->back()->with('failed',$th->getMessage());
         }
 
     }
    /**
     * Display the specified resource.
     */
    public function show(Bisnis $bisnis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bisnis $bisnis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $new = Bisnis::find($id);
            $new->tipe_bisnis = $request->tipe_bisnis;
    
            if ($new->save()) {

                $log = new LogAction();
                $log->id_user =  Auth::user()->id;
                $log->event = Auth::user()->name. ' Mengedit Tipe Bisnis : '.$new->tipe_bisnis;
                $log->save();

                return redirect()->back()->with('success','Data Tipe Bisnis Berhasil Diedit!');
            }else{
                return redirect()->back()->with('failed','Data Tipe Bisnis Gagal Diedit!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $new = Bisnis::find($id);
    
            $log = new LogAction();
            $log->id_user =  Auth::user()->id;
            $log->event = Auth::user()->name. ' Mengahpus Tipe Bisnis : '.$new->tipe_bisnis;
            $log->save();
            if ($new->delete()) {
                return redirect()->back()->with('success','Data Tipe Bisnis Berhasil Dihapus!');
            }else{
                return redirect()->back()->with('failed','Data Tipe Bisnis Gagal Dihapus!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed',$th->getMessage());
        }
    }
}
