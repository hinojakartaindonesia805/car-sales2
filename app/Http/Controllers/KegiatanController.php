<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Kegiatan';
        $data['kegiatan'] = Kegiatan::orderBy('id','desc')->get();
		return view('kegiatan/kegiatan',$data);
    }

    public function store(Request $request)
    {
        try {
            $data = new Kegiatan();
            $data->kegiatan = $request->kegiatan;
            $data->tahun = $request->tahun;
            $data->tanggal_dari = $request->tanggal_dari;
            $data->tanggal_sampai = $request->tanggal_sampai;
            $data->waktu_dari = $request->waktu_dari;
            $data->waktu_sampai = $request->waktu_sampai;
            $data->save();

            return redirect()->back()->with('success','Data has been created');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Data Failed created');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = Kegiatan::find($id);
            $data->kegiatan = $request->kegiatan;
            $data->tahun = $request->tahun;
            $data->tanggal_dari = $request->tanggal_dari;
            $data->tanggal_sampai = $request->tanggal_sampai;
            $data->waktu_dari = $request->waktu_dari;
            $data->waktu_sampai = $request->waktu_sampai;
            $data->save();

            return redirect()->back()->with('success','Data has been updated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Data Failed updated');
        }
    }

    public function delete($id)
    {
        try {
            $data = Kegiatan::find($id);
            $data->delete();

            return redirect()->back()->with('success','Data has been delete');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Data Failed delete');
        }
    }
}
